# Font Assets

If you are providing web font files, this is the place to put them. The fonts task will copy them over to the destination specified in `tools/config.ts`.

### Gulp Tasks
```
tools/tasks/build.fonts.ts
```
All this task does is copy fonts from `./src/fonts` to `./public/fonts`. 

### Mixins
A sass `font-face` mixin is included in `./src/stylesheets/mixins/_font-face.scss`.

Include mixin in your css font file (example: `./src/stylesheets/fonts/_open-sans.scss`).
```
@include font-face("Open Sans", "fonts/open-sans-regular");
```
Rendered as CSS:
```
@font-face {
    font-family: "Open Sans";
    src: url('open-sans-regular.eot');
      src: url('open-sans-regular.eot?#iefix') format('embedded-opentype'),
           url('open-sans-regular.woff') format('woff'),
           url('open-sans-regular.ttf') format('truetype'),
           url('open-sans-regular.svg#Open Sans') format('svg');
    font-weight: normal;
    font-style: normal;
}
```
Or Create a font face rule that applies to bold and italic text.
```
@include font-face("Open Sans", "fonts/open-sans-bold-italic", bold, italic);
```
Rendered as CSS:
```
@font-face {
    font-family: "Open Sans";
    src: url('open-sans-regular.eot');
      src: url('open-sans-bold-italic.eot?#iefix') format('embedded-opentype'),
           url('open-sans-bold-italic.woff') format('woff'),
           url('open-sans-bold-italic.ttf') format('truetype'),
           url('open-sans-bold-italic.svg#Open Sans') format('svg');
    font-weight: bold;
    font-style: italic;
}
```