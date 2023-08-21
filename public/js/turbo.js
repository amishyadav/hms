(function (factory) {
    typeof define === 'function' && define.amd ? define(factory) :
        factory()
}((function () {
    'use strict'

    // if (window.livewire) {
    //     console.warn(
    //         "Livewire: It looks like Livewire's @livewireScripts JavaScript assets have already been loaded. Make sure you aren't loading them twice."
    //     );
    // }
    //
    // window.livewire = new window.Livewire();
    // window.livewire.devTools(true);
    // window.Livewire = window.livewire;
    // window.livewire_app_url = "";
    // window.livewire_token = "ZgcGN7YWdBf2wfwJQoDJ3pUHfwhBmAAlSoeBpQXD";
    //
    // /* Make sure Livewire loads first. */
    // if (window.Alpine) {
    //     /* Defer showing the warning so it doesn't get buried under downstream errors. */
    //     document.addEventListener("DOMContentLoaded", function () {
    //         setTimeout(function () {
    //             console.warn(
    //                 "Livewire: It looks like AlpineJS has already been loaded. Make sure Livewire's scripts are loaded before Alpine.\\n\\n Reference docs for more info: http://laravel-livewire.com/docs/alpine-js"
    //             );
    //         });
    //     });
    // }
    //
    // /* Make Alpine wait until Livewire is finished rendering to do its thing. */
    window.deferLoadingAlpine = function (callback) {
        window.addEventListener("livewire:load", function () {
            callback();
        });
    };

    let started = false;

    window.addEventListener("alpine:initializing", function () {
        if (!started) {
            window.livewire.start();

            started = true;
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        if (!started) {
            window.livewire.start();

            started = true;
        }
    });


    // console.log(window.Livewire.hook)
    // console.log(window.Livewire.hook())
    if (typeof window.livewire === 'undefined') {
        throw 'Livewire Turbolinks Plugin: window.Livewire is undefined. Make sure livewire Scripts is placed above this script include'
    }

    var firstTime = true

    function wireTurboAfterFirstVisit () {
        // We only want this handler to run AFTER the first load.
        if (firstTime) {
            firstTime = false
            return
        }

        window.Livewire.restart()
        window.Alpine && window.Alpine.flushAndStopDeferringMutations &&
        window.Alpine.flushAndStopDeferringMutations()
    }

    function wireTurboBeforeCache () {
        document.querySelectorAll('[wire\\:id]').forEach(function (el) {
            const component = el.__livewire
            const dataObject = {
                fingerprint: component.fingerprint,
                serverMemo: component.serverMemo,
                effects: component.effects,
            }
            el.setAttribute('wire:initial-data', JSON.stringify(dataObject))
        })
        window.Alpine && window.Alpine.deferMutations &&
        window.Alpine.deferMutations()
    }

    document.addEventListener('turbo:load', wireTurboAfterFirstVisit)
    document.addEventListener('turbo:before-cache', wireTurboBeforeCache)
    document.addEventListener('turbolinks:load', wireTurboAfterFirstVisit)
    document.addEventListener('turbolinks:before-cache', wireTurboBeforeCache)
    Livewire.hook('beforePushState', state => {
        if (!state.turbolinks) state.turbolinks = {}
    })
    Livewire.hook('beforeReplaceState', state => {
        if (!state.turbolinks) state.turbolinks = {}
    })

})))
