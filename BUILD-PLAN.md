# BUILD-PLAN.md — Jugogradnja

Phased build plan, page inventory, custom post types, and reusable blocks. Read alongside CLAUDE.md. Figma file key: `9a9EbaNY2O1GKylr22Uq8N`.

## Page and template inventory

Each page is a top-level frame in Figma. Fetch the node ID listed to pull the design for that section.

Each page now has both a desktop frame (root `4219:2`) and a mobile frame at 393px (root `4575:2`). Copy is taken from the desktop frame in all cases, since desktop is the approved final.

### Standard pages (regular WordPress pages, built from block patterns)

| Page | Desktop node | Mobile node |
|------|--------------|-------------|
| Početna (Home) | 683:1636 | 4576:260 |
| O nama (About) | 683:1949 | 4577:12155 |
| Usluge (Services hub) | 683:2742 | 4576:856 |
| Inženjering | 683:2950 | no exact mobile frame (see service mismatch below) |
| Visokogradnja | 683:3323 | no exact mobile frame (see service mismatch below) |
| Rekonstrukcija i adaptacija | 683:3868 | 4576:1287 |
| Usluge enterijera | 683:4323 | 4577:1925 |
| Kontakt | 683:6504 | 4577:8515 |
| Sofeija (furniture/interior brand section, like VELUX) | nav item only, no top-level desktop frame found | 4577:9313 |

Service set (clarified): desktop is the complete source of truth and its four services are canonical: Inženjering (683:2950), Visokogradnja (683:3323), Rekonstrukcija i adaptacija (683:3868), Usluge enterijera (683:4323). The mobile service frames are only a responsive-breakdown reference and some carry older labels (Izgradnja objekata at 4576:993, Investicije i razvoj projekata at 4576:1611); these do not override desktop. Build all four desktop services for mobile too, applying the breakdown shown in the mobile service frames (4576:1287, 4577:1925, 4576:993, 4576:1611) as layout guidance.

### VELUX subsection (regular pages, its own pattern set)

| Page | Desktop node | Mobile node |
|------|--------------|-------------|
| VELUX (main landing, very long) | 683:6797 | 4577:3665 |
| VELUX osnovni | 683:7696 | 4577:4663 |
| VELUX prozori (triple glass) | 683:8316 | 4577:5339 (mobile labelled "standard plus", confirm) |
| VELUX Komfor | 683:8924 | 4577:6006 |
| VELUX Komfor Plus | 683:9658 | 4577:6867 |
| VELUX Roletne | 683:10249 | 4577:7498 |
| VELUX kupovni vodič (buying guide) | 683:10711 | 4577:7998 |

VELUX variant naming differs slightly between desktop and mobile; confirm the desktop "prozori (triple glass)" maps to the mobile "standard plus" frame.

### Custom post types (archive + single templates)

| Content | Archive node ID | Single node ID |
|---------|-----------------|----------------|
| Reference / Projekti | 705:3 | 705:1025 |
| Nekretnine (real estate) | 683:4733 | 683:5154 |
| Karijera pozicije (job positions) | 683:5930 | 683:6143 |
| Karijera (careers landing page) | 683:5639 | n/a (regular page) |

Mobile: the Karijera landing has mobile frame 4577:3370 and the Reference / Projekti archive has mobile frame 4577:2281. Dedicated mobile frames for Nekretnine and for the CPT single views (project, property, position) were not found in the mobile canvas; build those mobile views from the responsive rules using the desktop frames plus the existing mobile listing patterns as reference.

## Navigation, footer, and company details

Confirmed from the canonical desktop header (Home frame, node 683:1903 / Navigation 683:1906) and the mobile navigation drawer (node 4577:10283).

This header is the single global header used on every page.

Desktop primary navigation, in order: O nama, Usluge, Reference, Nekretnine, Sofeija, VELUX, Kontakt. The logo links to the home page (Home is not a separate nav item on desktop). Items with dropdown menus: Usluge, Sofeija, and VELUX. On the right of the bar: a SR | EN language control.

Mobile drawer lists the same items with Početna (Home) added at the top.

Karijera does not appear in the primary nav; confirm it lives in the footer.

Sofeija (resolved): it is a furniture and interior-furnishing brand section, structurally like VELUX. Its mobile page (4577:9313) presents the brand (tradition since 1981, 15,000+ employees, 4,000+ showrooms worldwide, intelligent production plants). The desktop header has Sofeija with a dropdown, but no dedicated top-level desktop Sofeija page frame was found, only the nav item. Confirm: the Sofeija dropdown's submenu items (the static frame does not expose them, they render on hover), and whether a desktop Sofeija landing page should be built from the mobile design.

Dropdown contents: Usluge, Sofeija, and VELUX have dropdowns. The static header frame does not expose submenu items, so by inference: Usluge lists the four desktop services (Inženjering, Visokogradnja, Rekonstrukcija i adaptacija, Usluge enterijera); VELUX lists its subpages (osnovni, prozori, Komfor, Komfor Plus, Roletne, vodič); Sofeija lists furniture/product categories (to confirm). Verify each dropdown's exact items in Figma's interactive view or with the client.

Language and script control (confirmed): the SR control in the header is itself the Cyrillic/Latin script toggle, and it is labelled in the script the visitor will switch to. There is no separate third control.
- In Cyrillic (default Serbian): the control reads "Sr | En". Clicking "Sr" switches the site to Latin.
- In Latin: the control reads "ср | En". Clicking "ср" switches back to Cyrillic.
- "En" switches to English in both Serbian modes.
Implementation: Cyrillic to Latin is the transliteration layer (single Cyrillic source, Latin generated on the fly); English is the WPML translation. The header control combines them; the Serbian label text is dynamic based on the current script. Confirm the English-mode label (it should offer a path back to Serbian, defaulting to Cyrillic).

Company and contact details (for the footer and Kontakt page):
- Company: Jugogradnja d.o.o., founded 1992 ("Od 1992. godine").
- Sedište (head office): Pukovnika Pejovića 7a, Beograd. Hours 08:00 to 16:00.
- Maloprodaja (retail): Svetozara Nikčevića 66. Hours 07:00 to 15:00.
- Phone: +381 11 624 80 75, +381 64 811 58 68.
- Email: gradnja@jugogradnja.rs, prodaja@jugogradnja.rs.
- Footer legal line: © 2026 Jugogradnja d.o.o. Sva prava zadržana. Links: Politika privatnosti, Uslovi korišćenja.

## Custom post types and fields

Use native custom fields or a light meta layer. Keep slugs in Latin.

### `projekat` (Reference / Projekti)
- Title, featured image, gallery, short description, full description.
- Meta: lokacija, godina, površina, klijent, status.
- Taxonomy: `kategorija_projekta` (project category).
- Templates: archive (705:3) as a filterable grid of project cards; single (705:1025).

### `nekretnina` (Real estate)
- Title, featured image, gallery, description.
- Meta: cena, lokacija, kvadratura, broj soba, sprat, status (na prodaju / izdato / prodato).
- Taxonomy: `tip_nekretnine` (property type).
- Templates: archive (683:4733) as a listing grid with filters; single (683:5154) with gallery and detail spec block.

### `pozicija` (Job position)
- Title, description, responsibilities, requirements.
- Meta: lokacija, tip zaposlenja, rok prijave.
- Templates: positions listing (683:5930); single (683:6143) with an application form.

## Reusable blocks and patterns

Build these once, reuse across pages. Static sections become block patterns; items needing a query or interaction become custom dynamic blocks.

Patterns (static):
- Hero: full-bleed image, blue gradient overlay ("Plavi Gradient"), centered heading, paragraph, outlined CTA, scroll indicator.
- Section heading: centered, blue, optional subheading.
- Intro paragraph block.
- Four-pillar card grid: image cards with label overlay.
- Certifications / licenses strip: three columns with cert badges.
- CTA banner: solid blue, heading, button.
- Content + image split: two-column alternating.
- Breadcrumb / back link.

Custom dynamic blocks:
- Stat counters: gold numbers with labels, optional count-up on scroll.
- Project card grid: query loop over `projekat`, styled to match design.
- Real estate listing grid: query loop over `nekretnina` with filters.
- Positions list: query loop over `pozicija`.
- Accordion / steps: used in the VELUX buying guide and FAQ areas.
- Contact form and job application form blocks.

Template parts:
- Header (single global header for all pages): build from the Home frame's Header, desktop node `683:1903` (Navigation `683:1906`); mobile header and drawer node `4577:10283`. Contains logo (links home), primary nav with dropdowns, and the SR | EN language control. See the navigation section below.
- Footer with columns, contact details, and secondary nav.

## Phased tasks

### Phase 0 — Setup
- Initialize git repo and `wp-env` (or DDEV).
- Scaffold the custom block theme with `theme.json`, `style.css`, `functions.php`, `/parts`, `/templates`, `/patterns`, `/blocks`.
- Install and configure WPML (paid license) with languages sr and en, plus String Translation for theme strings. Decide and wire the Cyrillic-to-Latin transliteration approach (see Open items).
- Export all Figma assets (hero images, icons, logo, cert badges) and commit them. Convert raster images to WebP/AVIF.
- Register self-hosted Montserrat and Roboto, subset for Latin + Cyrillic.

### Phase 1 — Design system foundation
- Populate `theme.json` from design-tokens (see starter `theme.json`).
- Build header and footer template parts, including the language and script switchers.
- Build the base templates: front-page, page, single, archive, 404, search.
- Verify global typography and color render correctly across scripts.

### Phase 2 — Blocks and patterns
- Build each pattern and custom block listed above, verified against its Figma node.

### Phase 3 — Standard pages
- Assemble Home (683:1636), O nama (683:1949), Usluge (683:2742), the four service pages, and Kontakt (683:6504) from patterns and blocks.

### Phase 4 — Custom post types
- Register `projekat`, `nekretnina`, `pozicija` with their fields and taxonomies.
- Build archive and single templates for each, matched to the Figma nodes.
- Add a few sample entries per type for QA.

### Phase 5 — VELUX subsection
- Build the VELUX landing (683:6797) and the six subpages. This is the largest single section, so treat it as its own milestone.

### Phase 6 — Multilingual and content
- Enter English translations via WPML (Translation Management and the translation editor), including CPT content, taxonomies, and menus.
- Confirm the Cyrillic/Latin toggle works site-wide, including in CPT content and menus.
- Wire menus and language/script switchers in the header.

### Phase 7 — Forms, SEO, performance, QA, launch
- Wire the contact and job application forms with spam protection.
- Add SEO basics: titles, meta, sitemaps, schema for the organization and job postings.
- Run the performance pass: per-block CSS loading, font preload, image audit, JS deferral, caching.
- Responsive QA against Figma at desktop, tablet, and mobile widths.
- Launch checklist: redirects, 404s, analytics, backups, security hardening.

## Open items to confirm with the client

1. Transliteration: confirm Latin is auto-generated from Cyrillic (recommended) rather than maintained as separate content. Confirm a preferred transliteration plugin or a custom filter.
2. Forms: confirm the form solution (a lightweight plugin versus a small custom block). Confirm recipient addresses and whether applications need file uploads (CVs).
3. Hosting and deploy target: where the site will be hosted and how Claude Code should deploy (this affects caching strategy and the launch checklist).
4. Mobile behavior: mobile frames exist at 393px (root 4575:2) and are now mapped to pages (see the tables). Remaining: confirm whether utility screens (404, search, cookie banner) need bespoke mobile treatment beyond the responsive rules in RESPONSIVE.md.
5. Real content: confirm whether real project, property, and job data will be migrated from the existing site or entered fresh.
6. Sofeija: confirm the dropdown submenu items and whether a desktop Sofeija landing page should be built from the mobile design (4577:9313).
7. Dropdown contents: confirm the exact items under Usluge, Sofeija, and VELUX (not exposed in the static header frame).
8. Karijera: confirm it lives in the footer (it is not in the primary nav).

Resolved this round: the desktop-versus-mobile relationship (desktop is the complete source; mobile frames are breakdown references; reproduce all desktop elements on mobile), the canonical four services (the desktop set), and the Cyrillic/Latin toggle mechanic (the SR control toggles script and labels itself in the target script; see the navigation section).
