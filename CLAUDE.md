# WPKirk-Internationalization-Boilerplate

Focused demo of **plugin localization** (i18n) in WP Bones — `.pot` extraction, `.po` / `.mo`
/ `.json` compilation, the `__()` + `_e()` helpers in PHP, and the WP i18n JavaScript runtime
via `@wordpress/i18n`. Ships an Italian (`it_IT`) translation as a working example.

## What this demos

- `languages/wp-kirk.pot` — extracted translation template (from PHP + JS).
- `languages/wp-kirk-it_IT.po` / `.mo` / `.json` — Italian translations compiled from the POT.
- `config/plugin.php` → `TextDomain` = `wp-kirk`, `DomainPath` = `languages/`.
- Views and controllers use `__('String', 'wp-kirk')` and `_e('String', 'wp-kirk')` throughout.
- `yarn make-pot` + `yarn make-json` scripts shell out to WP-CLI for extraction/compilation.

**Key files to read first:**

| File | What to look at |
| --- | --- |
| `languages/wp-kirk.pot` | Template file listing every translatable string with source file reference |
| `languages/wp-kirk-it_IT.po` | Italian translation — edit here, then recompile `.mo`/`.json` |
| `config/plugin.php` | `TextDomain` + `DomainPath` wiring |
| `plugin/Http/Controllers/Dashboard/DashboardController.php` | Controller using `__()` |
| `package.json` | `make-pot` / `make-json` scripts |

## Smoke test (manual, ~30s)

With the plugin active:

1. `wp-content/debug.log` clean after activation.
2. Switch the site language to **Italian** (Settings → General → Site Language).
3. Reload `wp-admin` — strings like "WP Kirk", "Main View" should now appear translated in
   Italian. If the site language is English, they remain in English.
4. Regenerate the POT from source: `yarn make-pot` (requires WP-CLI). A fresh
   `languages/wp-kirk.pot` should be written with no errors.

## Use as a template

```sh
# 1. clone from the GitHub template
gh repo create my-i18n-plugin --template wpbones/WPKirk-Internationalization-Boilerplate --public --clone
cd my-i18n-plugin

# 2. rename the PHP namespace + plugin slug
composer install
php bones rename "My i18n Plugin"

# 3. build + activate
yarn install && yarn build
wp plugin activate my-i18n-plugin

# 4. extract translatable strings
yarn make-pot
```

Wrap every user-facing string in `__()` / `_e()` / `esc_html__()` / etc. On the JS side, import
`__` from `@wordpress/i18n` and call `wp_set_script_translations()` from the PHP enqueue
(the framework does this automatically for apps enqueued via `withAdminAppsScript()`).

## Framework surface exercised

This boilerplate is the **regression bed** for the i18n pipeline:

- `TextDomain` / `DomainPath` in `config/plugin.php` wired through `Plugin::boot()`
- `load_plugin_textdomain()` triggered by the framework on init
- `yarn make-pot` / `make-json` scripts (WP-CLI `i18n make-pot` + `make-json`)
- `wp_set_script_translations()` auto-called for `withAdminAppsScript()` bundles
- `.mo` / `.json` lookup wired to `DomainPath` (default `languages/`)
