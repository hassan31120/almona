!(function (e) {
    "function" == typeof define && define.amd
        ? define(["jquery"], e)
        : e(jQuery);
})(function (p) {
    "use strict";
    var f = !1 === p.support.optSelected,
        l = {};
    function r(e) {
        for (
            var r = l[p(this).prop("stickOnScroll")], c = 0, t = r.length;
            c < t;
            c++
        )
            !(function (e) {
                var t, o, i, n, s, l;
                null !== (e = r[c]) &&
                    (p.contains(document.documentElement, e.ele[0]) ||
                        (r[c] = e = null)),
                    null !== e &&
                        ((t = e.viewport.scrollTop()),
                        (o = e.getEleMaxTop()),
                        !1 === e.isWindow && f && e.ele.stop(),
                        o <= t
                            ? (!(i = {
                                  position: "fixed",
                                  top: e.topOffset - e.eleTopMargin,
                              }) === e.isWindow &&
                                  (i = {
                                      position: "absolute",
                                      top: t + e.topOffset - e.eleTopMargin,
                                  }),
                              (e.isStick = !0),
                              e.footerElement.length &&
                                  ((n = e.getEleTopPosition(e.footerElement)),
                                  (s = e.ele.outerHeight()),
                                  (l =
                                      i.top + s + e.bottomOffset + e.topOffset),
                                  !1 === e.isWindow
                                      ? (l = s + e.bottomOffset + e.topOffset)
                                      : ((l = i.top + t + s + e.bottomOffset),
                                        (n = e.getElementDistanceFromViewport(
                                            e.footerElement
                                        ))),
                                  n < l &&
                                      (!0 === e.isWindow
                                          ? (i.top =
                                                n - (t + s + e.bottomOffset))
                                          : (i.top = t - (l - n)))),
                              !0 === e.setParentOnStick &&
                                  e.eleParent.css(
                                      "height",
                                      e.eleParent.height()
                                  ),
                              !0 === e.setWidthOnStick &&
                                  e.ele.css("width", e.ele.css("width")),
                              e.isViewportOffsetParent ||
                                  (i.top =
                                      i.top -
                                      e.getElementDistanceFromViewport(
                                          e.eleOffsetParent
                                      )),
                              f && !1 === e.isWindow
                                  ? e.ele
                                        .addClass(e.stickClass)
                                        .css("position", i.position)
                                        .animate({ top: i.top }, 150)
                                  : e.ele.css(i).addClass(e.stickClass),
                              !1 === e.wasStickCalled &&
                                  ((e.wasStickCalled = !0),
                                  setTimeout(function () {
                                      !0 === e.isOnStickSet &&
                                          e.onStick.call(e.ele, e.ele),
                                          e.ele.trigger(
                                              "stickOnScroll:onStick",
                                              [e.ele]
                                          );
                                  }, 20)))
                            : t <= o &&
                              e.isStick &&
                              (e.ele
                                  .css({ position: "", top: "" })
                                  .removeClass(e.stickClass),
                              !(e.isStick = !1) === e.setParentOnStick &&
                                  e.eleParent.css("height", ""),
                              !0 === e.setWidthOnStick &&
                                  e.ele.css("width", ""),
                              (e.wasStickCalled = !1),
                              setTimeout(function () {
                                  e.isOnUnStickSet &&
                                      e.onUnStick.call(e.ele, e.ele),
                                      e.ele.trigger("stickOnScroll:onUnStick", [
                                          e.ele,
                                      ]);
                              }, 20)),
                        0 === t && e.setEleTop());
            })(r[c]);
        return this;
    }
    p.fn.stickOnScroll = function (s) {
        return this.each(function () {
            if (p(this).hasClass("hasStickOnScroll")) return this;
            var e,
                t,
                i = p.extend(
                    {},
                    {
                        topOffset: 0,
                        bottomOffset: 5,
                        footerElement: null,
                        viewport: window,
                        stickClass: "stickOnScroll-on",
                        setParentOnStick: !1,
                        setWidthOnStick: !1,
                        onStick: null,
                        onUnStick: null,
                    },
                    s
                ),
                o = 1800;
            function n() {
                i.setEleTop(),
                    (e = i.viewport.prop("stickOnScroll")),
                    i.isWindow ||
                        (i.isViewportOffsetParent =
                            i.eleOffsetParent[0] === i.viewport[0]),
                    e ||
                        ((e =
                            "stickOnScroll" +
                            String(Math.random()).replace(/\D/g, "")),
                        i.viewport.prop("stickOnScroll", e),
                        (l[e] = []),
                        i.viewport.on("scroll", r)),
                    l[e].push(i),
                    i.viewport.trigger("scroll");
            }
            return (
                (i.isStick = !1),
                (i.ele = p(this).addClass("hasStickOnScroll")),
                (i.eleParent = i.ele.parent()),
                (i.eleOffsetParent = i.ele.offsetParent()),
                (i.viewport = p(i.viewport)),
                (i.eleTop = 0),
                (i.eleTopMargin =
                    parseFloat(i.ele.css("margin-top") || 0) || 0),
                (i.footerElement = p(i.footerElement)),
                (i.isWindow = !0),
                (i.isOnStickSet = p.isFunction(i.onStick)),
                (i.isOnUnStickSet = p.isFunction(i.onUnStick)),
                (i.wasStickCalled = !1),
                (i.isViewportOffsetParent = !0),
                (i.setEleTop = function () {
                    !1 === i.isStick &&
                        (i.isWindow
                            ? (i.eleTop = i.ele.offset().top)
                            : (i.eleTop =
                                  i.ele.offset().top -
                                  i.viewport.offset().top));
                }),
                (i.getEleTopPosition = function (e) {
                    return i.isWindow
                        ? e.offset().top
                        : e.offset().top - i.viewport.offset().top;
                }),
                (i.getEleMaxTop = function () {
                    var e = i.eleTop - i.topOffset;
                    return i.isWindow || (e += i.eleTopMargin), e;
                }),
                (i.getElementDistanceFromViewport = function (e) {
                    var t = e.position().top,
                        o = e.offsetParent();
                    return (
                        o.is("body") ||
                            o.is("html") ||
                            (o[0] !== i.viewport[0]
                                ? (t += i.getElementDistanceFromViewport(o))
                                : (t += i.viewport.scrollTop())),
                        t
                    );
                }),
                !0 === i.setParentOnStick &&
                    i.eleParent.is("body") &&
                    (i.setParentOnStick = !1),
                p.isWindow(i.viewport[0]) || (i.isWindow = !1),
                i.ele.is(":visible")
                    ? n()
                    : (t = setInterval(function () {
                          (!i.ele.is(":visible") && o) ||
                              (clearInterval(t), n()),
                              --o;
                      }, 100)),
                this
            );
        });
    };
});
