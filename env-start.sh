#!/usr/bin/env bash
# env-start.sh — start wp-env with a workaround for the space in "Jugogradnja 2".
#
# Docker Desktop on macOS cannot bind-mount paths that contain spaces AND only
# shares certain host directories. We rsync the theme into /private/tmp (always
# accessible to Docker) and patch docker-compose.yml to mount from there.
#
# Usage: bash env-start.sh   (run from anywhere)
set -e

REAL_PATH="/Users/dusanlazarevic/Desktop/Claude/Jugogradnja 2"
THEME_SRC="$REAL_PATH/wp-content/themes/jugogradnja"
THEME_DST="/private/tmp/jugogradnja-stage/wp-content/themes/jugogradnja"

echo "Syncing theme to /private/tmp ..."
mkdir -p "$THEME_DST"
rsync -a --delete "$THEME_SRC/" "$THEME_DST/"
echo "Sync done."

cd "$REAL_PATH"
npx wp-env start

COMPOSE_FILE=$(ls ~/.wp-env/*/docker-compose.yml 2>/dev/null | head -1)
if [ -z "$COMPOSE_FILE" ]; then
  echo "Could not find docker-compose.yml" >&2
  exit 1
fi

echo "Patching $COMPOSE_FILE ..."

python3 - "$COMPOSE_FILE" "$THEME_DST" <<'PYEOF'
import re, sys

compose_file = sys.argv[1]
theme_dst    = sys.argv[2]

with open(compose_file) as f:
    content = f.read()

# Replace any existing jugogradnja theme mount (broken block scalar or old path)
patterns = [
    # Broken >- block scalar (path with space split across lines)
    (r'>-\r?\n\s+/[^\n]+?Jugogradnja\r?\n\s+2/wp-content/themes/jugogradnja:/var/www/html/wp-content/themes/jugogradnja',
     theme_dst + ':/var/www/html/wp-content/themes/jugogradnja'),
    # Already-patched but stale path
    (r'/(?:private/tmp|Users/[^\s]+)/jugogradnja[^:]+:/var/www/html/wp-content/themes/jugogradnja',
     theme_dst + ':/var/www/html/wp-content/themes/jugogradnja'),
]

total = 0
new_content = content
for pattern, replacement in patterns:
    new_content, n = re.subn(pattern, replacement, new_content)
    total += n

if total == 0:
    print("No replacements made — printing jugogradnja volume lines for debug:")
    for line in new_content.splitlines():
        if 'jugogradnja' in line.lower() and ('wp-content' in line or '>-' in line):
            print(" ", repr(line))
else:
    with open(compose_file, 'w') as f:
        f.write(new_content)
    print(f"Patched {total} occurrence(s). Mounting from: {theme_dst}")
PYEOF

# Force-recreate the wordpress container so the new volume binding takes effect
docker compose -f "$COMPOSE_FILE" up -d --force-recreate wordpress 2>&1 | tail -5

echo ""
echo "Done. Visit http://localhost:8888"
echo ""
echo "TIP: After editing theme files, re-sync with:"
echo "  rsync -a --delete '$THEME_SRC/' '$THEME_DST/'"
