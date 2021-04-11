## EVE Universe

A simple ESI search tool for searching Universe data in SeAT.

## How to use
Installation is easy. run:

`composer require simplyunnamed\eveuniverse`

Laravel will automatically load up the package.

## Adding Search to my pages
There are 4 searches provided.
- Character
- Alliance
- Corporation
- Faction

To include these in your form, use one of the following partials

- `@include('eveuniverse.search.character')`
- `@include('eveuniverse.search.corporation')`
- `@include('eveuniverse.search.alliance')`
- `@include('eveuniverse.search.faction')`

The following properties can be set:

- class: override the default class.
- id: Set an id
- modal: Provide the modal identifier
- name: Override the field name
- label: Change the label

Select2 can behave a little weird inside modals. If you do put this form in a modal,
make sure you provide the modal's id using the modal property.

- `@include('eveuniverse.search.character', ['modal'=>'#modal-id'])`
- `@include('eveuniverse.search.corporation', ['modal'=>'#modal-id'])`
- `@include('eveuniverse.search.alliance', ['modal'=>'#modal-id'])`
- `@include('eveuniverse.search.faction', ['modal'=>'#modal-id'])`

Sometimes, Modal forms are rendered serverside, and inserted into the body using javascript.
In this instances, some helper functions are available to initiate the fields.

 `eu_select2_modal($select_id, $type, $modal)`

examples of these use cases can be found in examples view folder.
You can also experience these examples after installing by going to 
`/eveuniverse/example`