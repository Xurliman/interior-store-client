/**
 * Panzoom for panning and zooming elements using CSS transforms
 * Copyright Timmy Willison and other contributors
 * https://github.com/timmywil/panzoom/blob/main/MIT-License.txt
 */
!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module
        ? (module.exports = e())
        : "function" == typeof define && define.amd
            ? define(e)
            : ((t = "undefined" != typeof globalThis ? globalThis : t || self).Panzoom =
                e());
})(this, function () {
    "use strict";
    var Y = function () {
        return (Y =
            Object.assign ||
            function (t) {
                for (var e, n = 1, o = arguments.length; n < o; n++)
                    for (var r in (e = arguments[n]))
                        Object.prototype.hasOwnProperty.call(e, r) && (t[r] = e[r]);
                return t;
            }).apply(this, arguments);
    };
    function C(t, e) {
        for (var n = t.length; n--; ) if (t[n].pointerId === e.pointerId) return n;
        return -1;
    }
    function T(t, e) {
        if (e.touches)
            for (var n = 0, o = 0, r = e.touches; o < r.length; o++) {
                var a = r[o];
                (a.pointerId = n++), T(t, a);
            }
        else -1 < (n = C(t, e)) && t.splice(n, 1), t.push(e);
    }
    function N(t) {
        for (var e, n = (t = t.slice(0)).pop(); (e = t.pop()); )
            n = {
                clientX: (e.clientX - n.clientX) / 2 + n.clientX,
                clientY: (e.clientY - n.clientY) / 2 + n.clientY,
            };
        return n;
    }
    function L(t) {
        var e;
        return t.length < 2
            ? 0
            : ((e = t[0]),
                (t = t[1]),
                Math.sqrt(
                    Math.pow(Math.abs(t.clientX - e.clientX), 2) +
                    Math.pow(Math.abs(t.clientY - e.clientY), 2)
                ));
    }
    "undefined" != typeof window &&
    (window.NodeList &&
    !NodeList.prototype.forEach &&
    (NodeList.prototype.forEach = Array.prototype.forEach),
    "function" != typeof window.CustomEvent &&
    (window.CustomEvent = function (t, e) {
        e = e || { bubbles: !1, cancelable: !1, detail: null };
        var n = document.createEvent("CustomEvent");
        return n.initCustomEvent(t, e.bubbles, e.cancelable, e.detail), n;
    }));
    var V = { down: "mousedown", move: "mousemove", up: "mouseup mouseleave" };
    function D(t, e, n, o) {
        V[t].split(" ").forEach(function (t) {
            e.addEventListener(t, n, o);
        });
    }
    function G(t, e, n) {
        V[t].split(" ").forEach(function (t) {
            e.removeEventListener(t, n);
        });
    }
    "undefined" != typeof window &&
    ("function" == typeof window.PointerEvent
        ? (V = {
            down: "pointerdown",
            move: "pointermove",
            up: "pointerup pointerleave pointercancel",
        })
        : "function" == typeof window.TouchEvent &&
        (V = {
            down: "touchstart",
            move: "touchmove",
            up: "touchend touchcancel",
        }));
    var a,
        i = "undefined" != typeof document && !!document.documentMode;
    var c = ["webkit", "moz", "ms"],
        l = {};
    function I(t) {
        if (l[t]) return l[t];
        var e = (a = a || document.createElement("div").style);
        if (t in e) return (l[t] = t);
        for (var n = t[0].toUpperCase() + t.slice(1), o = c.length; o--; ) {
            var r = "".concat(c[o]).concat(n);
            if (r in e) return (l[t] = r);
        }
    }
    function o(t, e) {
        return parseFloat(e[I(t)]) || 0;
    }
    function s(t, e, n) {
        void 0 === n && (n = window.getComputedStyle(t));
        t = "border" === e ? "Width" : "";
        return {
            left: o("".concat(e, "Left").concat(t), n),
            right: o("".concat(e, "Right").concat(t), n),
            top: o("".concat(e, "Top").concat(t), n),
            bottom: o("".concat(e, "Bottom").concat(t), n),
        };
    }
    function W(t, e, n) {
        t.style[I(e)] = n;
    }
    function Z(t) {
        var e = t.parentNode,
            n = window.getComputedStyle(t),
            o = window.getComputedStyle(e),
            r = t.getBoundingClientRect(),
            a = e.getBoundingClientRect();
        return {
            elem: {
                style: n,
                width: r.width,
                height: r.height,
                top: r.top,
                bottom: r.bottom,
                left: r.left,
                right: r.right,
                margin: s(t, "margin", n),
                border: s(t, "border", n),
            },
            parent: {
                style: o,
                width: a.width,
                height: a.height,
                top: a.top,
                bottom: a.bottom,
                left: a.left,
                right: a.right,
                padding: s(e, "padding", o),
                border: s(e, "border", o),
            },
        };
    }
    var q = /^http:[\w\.\/]+svg$/;
    var B = {
        animate: !1,
        canvas: !1,
        cursor: "move",
        disablePan: !1,
        disableZoom: !1,
        disableXAxis: !1,
        disableYAxis: !1,
        duration: 200,
        easing: "ease-in-out",
        exclude: [],
        excludeClass: "panzoom-exclude",
        handleStartEvent: function (t) {
            t.preventDefault(), t.stopPropagation();
        },
        maxScale: 4,
        minScale: 0.125,
        overflow: "hidden",
        panOnlyWhenZoomed: !1,
        pinchAndPan: !1,
        relative: !1,
        setTransform: function (t, e, n) {
            var o = e.x,
                r = e.y,
                a = e.scale,
                e = e.isSVG;
            W(
                t,
                "transform",
                "scale(".concat(a, ") translate(").concat(o, "px, ").concat(r, "px)")
            ),
            e &&
            i &&
            ((a = window.getComputedStyle(t).getPropertyValue("transform")),
                t.setAttribute("transform", a));
        },
        startX: 0,
        startY: 0,
        startScale: 1,
        step: 0.3,
        touchAction: "none",
    };
    function t(u, f) {
        if (!u) throw new Error("Panzoom requires an element as an argument");
        if (1 !== u.nodeType)
            throw new Error("Panzoom requires an element with a nodeType of 1");
        if (
            ((e = (t = u).ownerDocument),
                (t = t.parentNode),
                !(
                    e &&
                    t &&
                    9 === e.nodeType &&
                    1 === t.nodeType &&
                    e.documentElement.contains(t)
                ))
        )
            throw new Error(
                "Panzoom should be called on elements that have been attached to the DOM"
            );
        (f = Y(Y({}, B), f)), (e = u);
        var t,
            e,
            l = q.test(e.namespaceURI) && "svg" !== e.nodeName.toLowerCase(),
            n = u.parentNode;
        (n.style.overflow = f.overflow),
            (n.style.userSelect = "none"),
            (n.style.touchAction = f.touchAction),
            ((f.canvas ? n : u).style.cursor = f.cursor),
            (u.style.userSelect = "none"),
            (u.style.touchAction = f.touchAction),
            W(
                u,
                "transformOrigin",
                "string" == typeof f.origin ? f.origin : l ? "0 0" : "50% 50%"
            );
        var r,
            a,
            i,
            c,
            s,
            d,
            m = 0,
            h = 0,
            v = 1,
            p = !1;
        function g(t, e, n) {
            n.silent || ((n = new CustomEvent(t, { detail: e })), u.dispatchEvent(n));
        }
        function y(o, r, t) {
            var a = { x: m, y: h, scale: v, isSVG: l, originalEvent: t };
            return (
                requestAnimationFrame(function () {
                    var t, e, n;
                    "boolean" == typeof r.animate &&
                    (r.animate
                        ? ((t = u),
                            (e = r),
                            (n = I("transform")),
                            W(
                                t,
                                "transition",
                                "".concat(n, " ").concat(e.duration, "ms ").concat(e.easing)
                            ))
                        : W(u, "transition", "none")),
                        r.setTransform(u, a, r),
                        g(o, a, r),
                        g("panzoomchange", a, r);
                }),
                    a
            );
        }
        function w(t, e, n, o) {
            var r,
                a,
                i,
                c,
                l,
                s,
                d,
                o = Y(Y({}, f), o),
                p = { x: m, y: h, opts: o };
            return (
                (!o.force &&
                    (o.disablePan || (o.panOnlyWhenZoomed && v === o.startScale))) ||
                ((t = parseFloat(t)),
                    (e = parseFloat(e)),
                o.disableXAxis || (p.x = (o.relative ? m : 0) + t),
                o.disableYAxis || (p.y = (o.relative ? h : 0) + e),
                o.contain &&
                ((e = ((r = (e = (t = Z(u)).elem.width / v) * n) - e) / 2),
                    (i = ((a = (i = t.elem.height / v) * n) - i) / 2),
                    "inside" === o.contain
                        ? ((c = (-t.elem.margin.left - t.parent.padding.left + e) / n),
                            (l =
                                (t.parent.width -
                                    r -
                                    t.parent.padding.left -
                                    t.elem.margin.left -
                                    t.parent.border.left -
                                    t.parent.border.right +
                                    e) /
                                n),
                            (p.x = Math.max(Math.min(p.x, l), c)),
                            (s = (-t.elem.margin.top - t.parent.padding.top + i) / n),
                            (d =
                                (t.parent.height -
                                    a -
                                    t.parent.padding.top -
                                    t.elem.margin.top -
                                    t.parent.border.top -
                                    t.parent.border.bottom +
                                    i) /
                                n),
                            (p.y = Math.max(Math.min(p.y, d), s)))
                        : "outside" === o.contain &&
                        ((c =
                            (-(r - t.parent.width) -
                                t.parent.padding.left -
                                t.parent.border.left -
                                t.parent.border.right +
                                e) /
                            n),
                            (l = (e - t.parent.padding.left) / n),
                            (p.x = Math.max(Math.min(p.x, l), c)),
                            (s =
                                (-(a - t.parent.height) -
                                    t.parent.padding.top -
                                    t.parent.border.top -
                                    t.parent.border.bottom +
                                    i) /
                                n),
                            (d = (i - t.parent.padding.top) / n),
                            (p.y = Math.max(Math.min(p.y, d), s)))),
                o.roundPixels && ((p.x = Math.round(p.x)), (p.y = Math.round(p.y)))),
                    p
            );
        }
        function b(t, e) {
            var n,
                o,
                r,
                a,
                e = Y(Y({}, f), e),
                i = { scale: v, opts: e };
            return (
                (!e.force && e.disableZoom) ||
                ((n = f.minScale),
                    (o = f.maxScale),
                e.contain &&
                ((a = (e = Z(u)).elem.width / v),
                    (r = e.elem.height / v),
                1 < a &&
                1 < r &&
                ((a =
                    (e.parent.width -
                        e.parent.border.left -
                        e.parent.border.right) /
                    a),
                    (e =
                        (e.parent.height -
                            e.parent.border.top -
                            e.parent.border.bottom) /
                        r),
                    "inside" === f.contain
                        ? (o = Math.min(o, a, e))
                        : "outside" === f.contain && (n = Math.max(n, a, e)))),
                    (i.scale = Math.min(Math.max(t, n), o))),
                    i
            );
        }
        function x(t, e, n, o) {
            t = w(t, e, v, n);
            return m !== t.x || h !== t.y
                ? ((m = t.x), (h = t.y), y("panzoompan", t.opts, o))
                : { x: m, y: h, scale: v, isSVG: l, originalEvent: o };
        }
        function E(t, e, n) {
            var o,
                r,
                e = b(t, e),
                a = e.opts;
            if (a.force || !a.disableZoom)
                return (
                    (t = e.scale),
                        (e = m),
                        (o = h),
                    a.focal &&
                    ((e = ((r = a.focal).x / t - r.x / v + m * t) / t),
                        (o = (r.y / t - r.y / v + h * t) / t)),
                        (r = w(e, o, t, { relative: !1, force: !0 })),
                        (m = r.x),
                        (h = r.y),
                        (v = t),
                        y("panzoomzoom", a, n)
                );
        }
        function o(t, e) {
            e = Y(Y(Y({}, f), { animate: !0 }), e);
            return E(v * Math.exp((t ? 1 : -1) * e.step), e);
        }
        function S(t, e, n, o) {
            var r = Z(u),
                a =
                    r.parent.width -
                    r.parent.padding.left -
                    r.parent.padding.right -
                    r.parent.border.left -
                    r.parent.border.right,
                i =
                    r.parent.height -
                    r.parent.padding.top -
                    r.parent.padding.bottom -
                    r.parent.border.top -
                    r.parent.border.bottom,
                c =
                    e.clientX -
                    r.parent.left -
                    r.parent.padding.left -
                    r.parent.border.left -
                    r.elem.margin.left,
                e =
                    e.clientY -
                    r.parent.top -
                    r.parent.padding.top -
                    r.parent.border.top -
                    r.elem.margin.top,
                r =
                    (l || ((c -= r.elem.width / v / 2), (e -= r.elem.height / v / 2)),
                        { x: (c / a) * (a * t), y: (e / i) * (i * t) });
            return E(t, Y(Y({}, n), { animate: !1, focal: r }), o);
        }
        E(f.startScale, { animate: !1, force: !0 }),
            setTimeout(function () {
                x(f.startX, f.startY, { animate: !1, force: !0 });
            });
        var M = [];
        function A(t) {
            !(function (t, e) {
                for (var n, o, r = t; null != r; r = r.parentNode)
                    if (
                        ((n = r),
                            (o = e.excludeClass),
                        (1 === n.nodeType &&
                            -1 <
                            " "
                                .concat((n.getAttribute("class") || "").trim(), " ")
                                .indexOf(" ".concat(o, " "))) ||
                        -1 < e.exclude.indexOf(r))
                    )
                        return 1;
            })(t.target, f) &&
            (T(M, t),
                (p = !0),
                f.handleStartEvent(t),
                g(
                    "panzoomstart",
                    { x: (r = m), y: (a = h), scale: v, isSVG: l, originalEvent: t },
                    f
                ),
                (t = N(M)),
                (i = t.clientX),
                (c = t.clientY),
                (s = v),
                (d = L(M)));
        }
        function P(t) {
            var e, n, o;
            p &&
            void 0 !== r &&
            void 0 !== a &&
            void 0 !== i &&
            void 0 !== c &&
            (T(M, t),
                (e = N(M)),
                (n = 1 < M.length),
                (o = v),
            n &&
            (0 === d && (d = L(M)),
                S(
                    (o = b(((L(M) - d) * f.step) / 80 + s).scale),
                    e,
                    { animate: !1 },
                    t
                )),
            (n && !f.pinchAndPan) ||
            x(
                r + (e.clientX - i) / o,
                a + (e.clientY - c) / o,
                { animate: !1 },
                t
            ));
        }
        function O(t) {
            1 === M.length &&
            g(
                "panzoomend",
                { x: m, y: h, scale: v, isSVG: l, originalEvent: t },
                f
            );
            var e = M;
            if (t.touches) for (; e.length; ) e.pop();
            else {
                t = C(e, t);
                -1 < t && e.splice(t, 1);
            }
            p && ((p = !1), (r = a = i = c = void 0));
        }
        var z = !1;
        function X() {
            z ||
            ((z = !0),
                D("down", f.canvas ? n : u, A),
                D("move", document, P, { passive: !0 }),
                D("up", document, O, { passive: !0 }));
        }
        return (
            f.noBind || X(),
                {
                    bind: X,
                    destroy: function () {
                        (z = !1),
                            G("down", f.canvas ? n : u, A),
                            G("move", document, P),
                            G("up", document, O);
                    },
                    eventNames: V,
                    getPan: function () {
                        return { x: m, y: h };
                    },
                    getScale: function () {
                        return v;
                    },
                    getOptions: function () {
                        var t,
                            e = f,
                            n = {};
                        for (t in e) e.hasOwnProperty(t) && (n[t] = e[t]);
                        return n;
                    },
                    handleDown: A,
                    handleMove: P,
                    handleUp: O,
                    pan: x,
                    reset: function (t) {
                        var t = Y(Y(Y({}, f), { animate: !0, force: !0 }), t),
                            e = ((v = b(t.startScale, t).scale), w(t.startX, t.startY, v, t));
                        return (m = e.x), (h = e.y), y("panzoomreset", t);
                    },
                    resetStyle: function () {
                        (n.style.overflow = ""),
                            (n.style.userSelect = ""),
                            (n.style.touchAction = ""),
                            (n.style.cursor = ""),
                            (u.style.cursor = ""),
                            (u.style.userSelect = ""),
                            (u.style.touchAction = ""),
                            W(u, "transformOrigin", "");
                    },
                    setOptions: function (t) {
                        for (var e in (t = void 0 === t ? {} : t))
                            t.hasOwnProperty(e) && (f[e] = t[e]);
                        (t.hasOwnProperty("cursor") || t.hasOwnProperty("canvas")) &&
                        ((n.style.cursor = u.style.cursor = ""),
                            ((f.canvas ? n : u).style.cursor = f.cursor)),
                        t.hasOwnProperty("overflow") && (n.style.overflow = t.overflow),
                        t.hasOwnProperty("touchAction") &&
                        ((n.style.touchAction = t.touchAction),
                            (u.style.touchAction = t.touchAction));
                    },
                    setStyle: function (t, e) {
                        return W(u, t, e);
                    },
                    zoom: E,
                    zoomIn: function (t) {
                        return o(!0, t);
                    },
                    zoomOut: function (t) {
                        return o(!1, t);
                    },
                    zoomToPoint: S,
                    zoomWithWheel: function (t, e) {
                        t.preventDefault();
                        var e = Y(Y(Y({}, f), e), { animate: !1 }),
                            n = 0 === t.deltaY && t.deltaX ? t.deltaX : t.deltaY;
                        return S(
                            b(v * Math.exp(((n < 0 ? 1 : -1) * e.step) / 3), e).scale,
                            t,
                            e,
                            t
                        );
                    },
                }
        );
    }
    return (t.defaultOptions = B), t;
});
