#!/usr/bin/env bash
# env-start.sh — start wp-env for the Jugogradnja project.
#
# Docker Desktop on macOS cannot bind-mount paths with spaces ("Jugogradnja 2").
# Workaround: copy theme files directly into the wp-env WordPress installation
# directory (~/.wp-env/.../WordPress/wp-content/themes/jugogradnja/), which
# has no spaces and is already fully mounted inside Docker.
#
# Usage: bash env-start.sh   (run from anywhere)
set -e

REAL_PATH="/Users/dusanlazarevic/Desktop/Claude/Jugogradnja 2"
THEME_SRC="$REAL_PATH/wp-content/themes/jugogradnja"

cd "$REAL_PATH"

# Start wp-env (creates ~/.wp-env/<hash>/ if not present)
npx wp-env start

# Find the wp-env installation directory
WP_ENV_DIR=$(ls -d ~/.wp-env/*/WordPress 2>/dev/null | head -1)
if [ -z "$WP_ENV_DIR" ]; then
  echo "ERROR: Could not find wp-env WordPress directory." >&2
  exit 1
fi

THEME_DST="$WP_ENV_DIR/wp-content/themes/jugogradnja"

echo "Syncing theme → $THEME_DST ..."
mkdir -p "$THEME_DST"
rsync -a --delete "$THEME_SRC/" "$THEME_DST/"
echo "Sync done ($(ls "$THEME_DST" | wc -l | tr -d ' ') items)."

echo ""
echo "Done. Visit http://localhost:8888"
echo ""
echo "TIP: After editing theme files, sync changes with:"
echo "  rsync -a --delete '$THEME_SRC/' '$THEME_DST/'"
