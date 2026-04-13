EHRI-ERIC WordPress theme
=========================

A 2026 WordPress theme for the https://www.ehri-project.eu/ site.

Design by [Beyond Local](https://beyondlocal.co.uk).

This is a classic theme, with some block functionality, so all in all
it's a bit confusing at the moment, with certain styling duplicated in
SCSS and the theme.json file. Hopefully we can figure out how to 
consolidate this at some point.

There's exactly one custom block, for the front page hero section, and
this is mostly to serve as an example for how to do blocks.

Some functionality in the functions.php is there to cater to 15 years
of accumulated content that was previously migrated from a Drupal site.
That will also hopefully be considated one day also.

To build everything:

    npm run sass
    npm run build


Plugins required for form functionality:

 - Contact Form 7
 - Flamingo
