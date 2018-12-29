/* Comment From Main */

"use strict";
var Layout = function() {
        function e() {
            $(".sidenav-toggler").addClass("active"), $(".sidenav-toggler").data("action", "sidenav-unpin"), $("body").removeClass("g-sidenav-hidden").addClass("g-sidenav-show g-sidenav-pinned"), $("body").append('<div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target=' + $("#sidenav-main").data("target") + " />"), Cookies.set("sidenav-state", "pinned")
        }

        function a() {
            $(".sidenav-toggler").removeClass("active"), $(".sidenav-toggler").data("action", "sidenav-pin"), $("body").removeClass("g-sidenav-pinned").addClass("g-sidenav-hidden"), $("body").find(".backdrop").remove(), Cookies.set("sidenav-state", "unpinned")
        }
        var t = Cookies.get("sidenav-state") ? Cookies.get("sidenav-state") : "pinned";
        $(window).width() > 1200 && ("pinned" == t && e(), "unpinned" == Cookies.get("sidenav-state") && a()), $("body").on("click", "[data-action]", function(t) {
            t.preventDefault();
            var n = $(this),
                i = n.data("action");
            n.data("target");
            switch (i) {
                case "sidenav-pin":
                    e();
                    break;
                case "sidenav-unpin":
                    a();
                    break;
                case "search-show":
                    n.data("target"), $("body").removeClass("g-navbar-search-show").addClass("g-navbar-search-showing"), setTimeout(function() {
                        $("body").removeClass("g-navbar-search-showing").addClass("g-navbar-search-show")
                    }, 150), setTimeout(function() {
                        $("body").addClass("g-navbar-search-shown")
                    }, 300);
                    break;
                case "search-close":
                    n.data("target"), $("body").removeClass("g-navbar-search-shown"), setTimeout(function() {
                        $("body").removeClass("g-navbar-search-show").addClass("g-navbar-search-hiding")
                    }, 150), setTimeout(function() {
                        $("body").removeClass("g-navbar-search-hiding").addClass("g-navbar-search-hidden")
                    }, 300), setTimeout(function() {
                        $("body").removeClass("g-navbar-search-hidden")
                    }, 500)
            }
        }), $(".sidenav").on("mouseenter", function() {
            $("body").hasClass("g-sidenav-pinned") || $("body").removeClass("g-sidenav-hide").removeClass("g-sidenav-hidden").addClass("g-sidenav-show")
        }), $(".sidenav").on("mouseleave", function() {
            $("body").hasClass("g-sidenav-pinned") || ($("body").removeClass("g-sidenav-show").addClass("g-sidenav-hide"), setTimeout(function() {
                $("body").removeClass("g-sidenav-hide").addClass("g-sidenav-hidden")
            }, 300))
        }), $(window).on("load resize", function() {
            $("body").height() < 800 && ($("body").css("min-height", "100vh"), $("#footer-main").addClass("footer-auto-bottom"))
        })
    }(),
    Scrollbar = function() {
        var e = $(".scrollbar-inner");
        e.length && e.scrollbar()
    }(),
    Navbar = function() {
        var e = $(".navbar-nav, .navbar-nav .nav"),
            a = $(".navbar .collapse"),
            t = $(".navbar .dropdown");
        a.on({
            "show.bs.collapse": function() {
                var t;
                (t = $(this)).closest(e).find(a).not(t).collapse("hide")
            }
        }), t.on({
            "hide.bs.dropdown": function() {
                var e, a;
                e = $(this), (a = e.find(".dropdown-menu")).addClass("close"), setTimeout(function() {
                    a.removeClass("close")
                }, 200)
            }
        })
    }(),
    NavbarCollapse = function() {
        $(".navbar-nav");
        var e = $(".navbar .navbar-custom-collapse");
        e.length && (e.on({
            "hide.bs.collapse": function() {
                e.addClass("collapsing-out")
            }
        }), e.on({
            "hidden.bs.collapse": function() {
                e.removeClass("collapsing-out")
            }
        }))
    }(),
    Popover = function() {
        var e = $('[data-toggle="popover"]'),
            a = "";
        e.length && e.each(function() {
            ! function(e) {
                e.data("color") && (a = "popover-" + e.data("color"));
                var t = {
                    trigger: "focus",
                    template: '<div class="popover ' + a + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
                };
                e.popover(t)
            }($(this))
        })
    }(),
    ScrollTo = function() {
        var e = $(".scroll-me, [data-scroll-to], .toc-entry a");

        function a(e) {
            var a = e.attr("href"),
                t = e.data("scroll-to-offset") ? e.data("scroll-to-offset") : 0,
                n = {
                    scrollTop: $(a).offset().top - t
                };
            $("html, body").stop(!0, !0).animate(n, 600), event.preventDefault()
        }
        e.length && e.on("click", function(e) {
            a($(this))
        })
    }(),
    FormControl = function() {
        var e = $(".form-control");
        e.length && e.on("focus blur", function(e) {
            $(this).parents(".form-group").toggleClass("focused", "focus" === e.type)
        }).trigger("blur")
    }(),
    Notify = function() {
        var e = $('[data-toggle="notify"]');
        e.length && e.on("click", function(e) {
            e.preventDefault(),
                function(e, a, t, n, i, o) {
                    $.notify({
                        icon: t,
                        title: " Bootstrap Notify",
                        message: "Turning standard Bootstrap alerts into awesome notifications",
                        url: ""
                    }, {
                        element: "body",
                        type: n,
                        allow_dismiss: !0,
                        placement: {
                            from: e,
                            align: a
                        },
                        offset: {
                            x: 15,
                            y: 15
                        },
                        spacing: 10,
                        z_index: 1080,
                        delay: 2500,
                        timer: 25e3,
                        url_target: "_blank",
                        mouse_over: !1,
                        animate: {
                            enter: i,
                            exit: o
                        },
                        template: '<div data-notify="container" class="alert alert-dismissible alert-{0} alert-notify" role="alert"><span class="alert-icon" data-notify="icon"></span> <div class="alert-text"</div> <span class="alert-title" data-notify="title">{1}</span> <span data-notify="message">{2}</span></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    })
                }($(this).attr("data-placement"), $(this).attr("data-align"), $(this).attr("data-icon"), $(this).attr("data-type"), $(this).attr("data-animation-in"), $(this).attr("data-animation-out"))
        })
    }();

    
$(document).ready(function() {
    $("body").bootstrapMaterialDesign({
        autofill: !1
    }),

    $(".vs-form-control").on("focus", function() {
        $(this).parent(".input-group").addClass("input-group-focus")
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus")
    })

});


(function(window) {
    'use strict';

    var Waves = Waves || {};
    var $$ = document.querySelectorAll.bind(document);

    // Find exact position of element
    function isWindow(obj) {
        return obj !== null && obj === obj.window;
    }

    function getWindow(elem) {
        return isWindow(elem) ? elem : elem.nodeType === 9 && elem.defaultView;
    }

    function offset(elem) {
        var docElem, win,
            box = {top: 0, left: 0},
            doc = elem && elem.ownerDocument;

        docElem = doc.documentElement;

        if (typeof elem.getBoundingClientRect !== typeof undefined) {
            box = elem.getBoundingClientRect();
        }
        win = getWindow(doc);
        return {
            top: box.top + win.pageYOffset - docElem.clientTop,
            left: box.left + win.pageXOffset - docElem.clientLeft
        };
    }

    function convertStyle(obj) {
        var style = '';

        for (var a in obj) {
            if (obj.hasOwnProperty(a)) {
                style += (a + ':' + obj[a] + ';');
            }
        }

        return style;
    }

    var Effect = {

        // Effect delay
        duration: 550,

        show: function(e, element) {

            // Disable right click
            if (e.button === 2) {
                return false;
            }

            var el = element || this;

            // Create ripple
            var ripple = document.createElement('div');
            ripple.className = 'waves-ripple';
            el.appendChild(ripple);

            // Get click coordinate and element witdh
            var pos         = offset(el);
            var relativeY   = (e.pageY - pos.top);
            var relativeX   = (e.pageX - pos.left);
            var scale       = 'scale('+((el.clientWidth / 100) * 10)+')';

            // Support for touch devices
            if ('touches' in e) {
              relativeY   = (e.touches[0].pageY - pos.top);
              relativeX   = (e.touches[0].pageX - pos.left);
            }

            // Attach data to element
            ripple.setAttribute('data-hold', Date.now());
            ripple.setAttribute('data-scale', scale);
            ripple.setAttribute('data-x', relativeX);
            ripple.setAttribute('data-y', relativeY);

            // Set ripple position
            var rippleStyle = {
                'top': relativeY+'px',
                'left': relativeX+'px'
            };

            ripple.className = ripple.className + ' waves-notransition';
            ripple.setAttribute('style', convertStyle(rippleStyle));
            ripple.className = ripple.className.replace('waves-notransition', '');

            // Scale the ripple
            rippleStyle['-webkit-transform'] = scale;
            rippleStyle['-moz-transform'] = scale;
            rippleStyle['-ms-transform'] = scale;
            rippleStyle['-o-transform'] = scale;
            rippleStyle.transform = scale;
            rippleStyle.opacity   = '1';

            rippleStyle['-webkit-transition-duration'] = Effect.duration + 'ms';
            rippleStyle['-moz-transition-duration']    = Effect.duration + 'ms';
            rippleStyle['-o-transition-duration']      = Effect.duration + 'ms';
            rippleStyle['transition-duration']         = Effect.duration + 'ms';

            rippleStyle['-webkit-transition-timing-function'] = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['-moz-transition-timing-function']    = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['-o-transition-timing-function']      = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['transition-timing-function']         = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';

            ripple.setAttribute('style', convertStyle(rippleStyle));
        },

        hide: function(e) {
            TouchHandler.touchup(e);

            var el = this;
            var width = el.clientWidth * 1.4;

            // Get first ripple
            var ripple = null;
            var ripples = el.getElementsByClassName('waves-ripple');
            if (ripples.length > 0) {
                ripple = ripples[ripples.length - 1];
            } else {
                return false;
            }

            var relativeX   = ripple.getAttribute('data-x');
            var relativeY   = ripple.getAttribute('data-y');
            var scale       = ripple.getAttribute('data-scale');

            // Get delay beetween mousedown and mouse leave
            var diff = Date.now() - Number(ripple.getAttribute('data-hold'));
            var delay = 350 - diff;

            if (delay < 0) {
                delay = 0;
            }

            // Fade out ripple after delay
            setTimeout(function() {
                var style = {
                    'top': relativeY+'px',
                    'left': relativeX+'px',
                    'opacity': '0',

                    // Duration
                    '-webkit-transition-duration': Effect.duration + 'ms',
                    '-moz-transition-duration': Effect.duration + 'ms',
                    '-o-transition-duration': Effect.duration + 'ms',
                    'transition-duration': Effect.duration + 'ms',
                    '-webkit-transform': scale,
                    '-moz-transform': scale,
                    '-ms-transform': scale,
                    '-o-transform': scale,
                    'transform': scale,
                };

                ripple.setAttribute('style', convertStyle(style));

                setTimeout(function() {
                    try {
                        el.removeChild(ripple);
                    } catch(e) {
                        return false;
                    }
                }, Effect.duration);
            }, delay);
        },

        // Little hack to make <input> can perform waves effect
        wrapInput: function(elements) {
            for (var a = 0; a < elements.length; a++) {
                var el = elements[a];

                if (el.tagName.toLowerCase() === 'input') {
                    var parent = el.parentNode;

                    // If input already have parent just pass through
                    if (parent.tagName.toLowerCase() === 'i' && parent.className.indexOf('waves-effect') !== -1) {
                        continue;
                    }

                    // Put element class and style to the specified parent
                    var wrapper = document.createElement('i');
                    wrapper.className = el.className + ' waves-input-wrapper';

                    var elementStyle = el.getAttribute('style');

                    if (!elementStyle) {
                        elementStyle = '';
                    }

                    wrapper.setAttribute('style', elementStyle);

                    el.className = 'waves-button-input';
                    el.removeAttribute('style');

                    // Put element as child
                    parent.replaceChild(wrapper, el);
                    wrapper.appendChild(el);
                }
            }
        }
    };


    /**
     * Disable mousedown event for 500ms during and after touch
     */
    var TouchHandler = {
        /* uses an integer rather than bool so there's no issues with
         * needing to clear timeouts if another touch event occurred
         * within the 500ms. Cannot mouseup between touchstart and
         * touchend, nor in the 500ms after touchend. */
        touches: 0,
        allowEvent: function(e) {
            var allow = true;

            if (e.type === 'touchstart') {
                TouchHandler.touches += 1; //push
            } else if (e.type === 'touchend' || e.type === 'touchcancel') {
                setTimeout(function() {
                    if (TouchHandler.touches > 0) {
                        TouchHandler.touches -= 1; //pop after 500ms
                    }
                }, 500);
            } else if (e.type === 'mousedown' && TouchHandler.touches > 0) {
                allow = false;
            }

            return allow;
        },
        touchup: function(e) {
            TouchHandler.allowEvent(e);
        }
    };


    /**
     * Delegated click handler for .waves-effect element.
     * returns null when .waves-effect element not in "click tree"
     */
    function getWavesEffectElement(e) {
        if (TouchHandler.allowEvent(e) === false) {
            return null;
        }

        var element = null;
        var target = e.target || e.srcElement;

        while (target.parentElement !== null) {
            if (!(target instanceof SVGElement) && target.className.indexOf('waves-effect') !== -1) {
                element = target;
                break;
            } else if (target.classList.contains('waves-effect')) {
                element = target;
                break;
            }
            target = target.parentElement;
        }

        return element;
    }

    /**
     * Bubble the click and show effect if .waves-effect elem was found
     */
    function showEffect(e) {
        var element = getWavesEffectElement(e);

        if (element !== null) {
            Effect.show(e, element);

            if ('ontouchstart' in window) {
                element.addEventListener('touchend', Effect.hide, false);
                element.addEventListener('touchcancel', Effect.hide, false);
            }

            element.addEventListener('mouseup', Effect.hide, false);
            element.addEventListener('mouseleave', Effect.hide, false);
        }
    }

    Waves.displayEffect = function(options) {
        options = options || {};

        if ('duration' in options) {
            Effect.duration = options.duration;
        }

        //Wrap input inside <i> tag
        Effect.wrapInput($$('.waves-effect'));

        if ('ontouchstart' in window) {
            document.body.addEventListener('touchstart', showEffect, false);
        }

        document.body.addEventListener('mousedown', showEffect, false);
    };

    /**
     * Attach Waves to an input element (or any element which doesn't
     * bubble mouseup/mousedown events).
     *   Intended to be used with dynamically loaded forms/inputs, or
     * where the user doesn't want a delegated click handler.
     */
    Waves.attach = function(element) {
        //FUTURE: automatically add waves classes and allow users
        // to specify them with an options param? Eg. light/classic/button
        if (element.tagName.toLowerCase() === 'input') {
            Effect.wrapInput([element]);
            element = element.parentElement;
        }

        if ('ontouchstart' in window) {
            element.addEventListener('touchstart', showEffect, false);
        }

        element.addEventListener('mousedown', showEffect, false);
    };

    window.Waves = Waves;

    document.addEventListener('DOMContentLoaded', function() {
        Waves.displayEffect();
    }, false);

})(window);
