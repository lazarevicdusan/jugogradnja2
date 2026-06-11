#!/usr/bin/env bash
# env-start.sh — start wp-env and patch the docker-compose.yml for the space in the project path.
# Usage: bash env-start.sh
set -e

REAL_PATH="/Users/dusanlazarevic/Desktop/Claude/Jugogradnja 2"
SAFE_PATH="/Users/dusanlazarevic/Desktop/Claude/jugogradnja-dev"

# Ensure symlink exists
ln -sfn "$REAL_PATH" "$SAFE_PATH"

cd "$REAL_PATH"
npx wp-env start

# Find the generated docker-compose.yml
COMPOSE_FILE=$(ls ~/.wp-env/*/docker-compose.yml 2>/dev/null | head -1)
if [ -z "$COMPOSE_FILE" ]; then
  echo "Could not find docker-compose.yml" >&2
  exit 1
fi

echo "Patching $COMPOSE_FILE ..."

# Replace the broken multi-line volume with the symlink path
python3 - <<PYEOF
import re, sys

path = "$COMPOSE_FILE"
safe = "$SAFE_PATH"

with open(path) as f:
    content = f.read()

# The broken pattern: ">-\n        /...Jugogradnja\n        2/wp-content/themes/jugogradnja:..."
broken = r'>-\n\s+/[^\n]+Jugogradnja\n\s+2/wp-content/themes/jugogradnja:/var/www/html/wp-content/themes/jugogradnja'
fixed  = f"'{safe}/wp-content/themes/jugogradnja:/var/www/html/wp-content/themes/jugogradnja'"

new_content = re.sub(broken, fixed, content)

if new_content == content:
    print("Pattern not found — mount may already be correct or format changed.")
else:
    with open(path, 'w') as f:
        f.write(new_content)
    print("Patched successfully.")
PYEOF

# Restart the containers with the patched config
COMPOSE_DIR=$(dirname "$COMPOSE_FILE")
docker compose -f "$COMPOSE_FILE" up -d 2>&1 | tail -5
echo "Done. Visit http://localhost:8888"
