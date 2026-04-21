#!/usr/bin/env bash

set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

assert_contains() {
  local file="$1"
  local pattern="$2"
  local message="$3"

  # Use `--` so patterns beginning with `--` are treated as patterns, not flags.
  if ! grep -Eq -- "$pattern" "$file"; then
    echo "ERROR: $message"
    echo "  file: $file"
    echo "  pattern: $pattern"
    return 1
  fi
}

THEME_CSS="$ROOT_DIR/resources/css/v1/theme.css"
THEMING_DOC="$ROOT_DIR/docs/guide/theming.md"

assert_contains "$THEME_CSS" "--surface-base:\s*white;" "Global surface token missing from theme.css"
assert_contains "$THEMING_DOC" "--surface-base:" "Global surface token missing from theming guide"

check_surface_token_mapping() {
  local css_file="$1"
  local doc_file="$2"
  local token_name="$3"

  assert_contains "$css_file" "${token_name}:\\s*var\\(--surface-base\\);" "${token_name} must map to --surface-base in CSS"
  assert_contains "$doc_file" "${token_name}:\\s*var\\(--surface-base\\);" "${token_name} must map to --surface-base in docs"
}

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/input.css" \
  "$ROOT_DIR/docs/components/input.md" \
  "--input-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/select.css" \
  "$ROOT_DIR/docs/components/select.md" \
  "--select-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/select.css" \
  "$ROOT_DIR/docs/components/select.md" \
  "--select-menu-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/multi-select.css" \
  "$ROOT_DIR/docs/components/multi-select.md" \
  "--multiselect-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/multi-select.css" \
  "$ROOT_DIR/docs/components/multi-select.md" \
  "--multiselect-menu-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/multi-select.css" \
  "$ROOT_DIR/docs/components/multi-select.md" \
  "--multiselect-option-check-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/multi-select.css" \
  "$ROOT_DIR/docs/components/multi-select.md" \
  "--multiselect-option-check-inset"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/textarea.css" \
  "$ROOT_DIR/docs/components/textarea.md" \
  "--textarea-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/radio.css" \
  "$ROOT_DIR/docs/components/radio.md" \
  "--radio-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/form/toggle.css" \
  "$ROOT_DIR/docs/components/toggle.md" \
  "--toggle-thumb-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/display/table.css" \
  "$ROOT_DIR/docs/components/table.md" \
  "--table-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/display/card.css" \
  "$ROOT_DIR/docs/components/card.md" \
  "--card-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/layout/divider.css" \
  "$ROOT_DIR/docs/components/divider.md" \
  "--divider-label-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/display/stat.css" \
  "$ROOT_DIR/docs/components/stat.md" \
  "--stat-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/navigation/dropdown-menu.css" \
  "$ROOT_DIR/docs/components/dropdown-menu.md" \
  "--dropdown-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/navigation/dropdown-menu.css" \
  "$ROOT_DIR/docs/components/dropdown-menu.md" \
  "--dropdown-trigger-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/navigation/pagination.css" \
  "$ROOT_DIR/docs/components/pagination.md" \
  "--pagination-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/navigation/tabs.css" \
  "$ROOT_DIR/docs/components/tabs.md" \
  "--tabs-boxed-active-bg"

check_surface_token_mapping \
  "$ROOT_DIR/resources/css/v1/components/dialog/modal.css" \
  "$ROOT_DIR/docs/components/modal.md" \
  "--modal-bg"

echo "CSS-doc token sync checks passed."
