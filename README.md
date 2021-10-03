## wire:loading.class issue

Something odd is happening when using `wire:loading` directive 
with the `class` modifier. In this specific case, when
used in a `@forelse` loop associated with a transaction search query in the `Dashboard` 
livewire component, the `wire:loading.class="whatever"` directive in the blade view causes non-stop `syncInput` 
requests to fire in the browser when additional input is typed *after* the initial
search finds no records. 

For example (using my repo's simplified code based on Caleb's 
screencast *Building Data Tables -> Basic Search*), quickly type 
in a search string (*in this case, yourapp/dashboard*) that should produce 
`No transactions...`. If you typed quickly enough, you should see the 
round-trip in the networking tab. Then type one or more additional letters
... then *boom*, non-stop `syncInput` requests begin to fire.

To stop it you must backspace over the search string until some 
records are found. I've tried other `wire:loading` directives, but none
but the `class` modifier seem to trigger this behavior.

I think Caleb also ran into this issue in hte *Basic Search* video about time marker
*9:48* when he says "Oh, I have some loopty-dupe thing going on". If you look in
the bottom left corner of his screen you will see the "Waiting for surge.test..." 
messages flashing in the browser. That's when I think he hit the problem. I think
refreshing, then not triggering it again, may have stopped the issue during the remaining time
of the video.

I am using both Chrome and Firefox (latest) on linux, running laravel 8.62.0, php 8.0.11
in Homestead 11.4.0, with livewire 2.6.7.

So setup, copy the example .env file and add your DB stuff. 
Then migrate with seed (this gives you 250 transactions from the factory).
Then go to your site's `dashboard` route, and quickly type in a bunch of 
gibberish. You should get `No transactions...` in the table. 

Then type some
additional characters and look at your browser's networking tab in the
dev tools. You should see a barrage of `syncInput` requests.


