!function () {
    "use strict";

    function t(t) {
        this.time = t.time, this.target = t.target, this.rootBounds = t.rootBounds, this.boundingClientRect = t.boundingClientRect, this.intersectionRect = t.intersectionRect || c(), this.isIntersecting = !!t.intersectionRect;
        var e = this.boundingClientRect, n = e.width * e.height, o = this.intersectionRect, i = o.width * o.height;
        this.intersectionRatio = n ? Number((i / n).toFixed(4)) : this.isIntersecting ? 1 : 0
    }

    function e(t, e) {
        var n = e || {};
        if ("function" != typeof t) throw new Error("callback must be a function");
        if (n.root && 1 != n.root.nodeType) throw new Error("root must be an Element");
        this._checkForIntersections = o(this._checkForIntersections.bind(this), this.THROTTLE_TIMEOUT), this._callback = t, this._observationTargets = [], this._queuedEntries = [], this._rootMarginValues = this._parseRootMargin(n.rootMargin), this.thresholds = this._initThresholds(n.threshold), this.root = n.root || null, this.rootMargin = this._rootMarginValues.map(function (t) {
            return t.value + t.unit
        }).join(" ")
    }

    function n() {
        return window.performance && performance.now && performance.now()
    }

    function o(t, e) {
        var n = null;
        return function () {
            n || (n = setTimeout(function () {
                t(), n = null
            }, e))
        }
    }

    function i(t, e, n, o) {
        "function" == typeof t.addEventListener ? t.addEventListener(e, n, o || !1) : "function" == typeof t.attachEvent && t.attachEvent("on" + e, n)
    }

    function r(t, e, n, o) {
        "function" == typeof t.removeEventListener ? t.removeEventListener(e, n, o || !1) : "function" == typeof t.detatchEvent && t.detatchEvent("on" + e, n)
    }

    function s(t, e) {
        var n = Math.max(t.top, e.top), o = Math.min(t.bottom, e.bottom), i = Math.max(t.left, e.left),
            r = Math.min(t.right, e.right), s = r - i, h = o - n;
        return s >= 0 && h >= 0 && {top: n, bottom: o, left: i, right: r, width: s, height: h}
    }

    function h(t) {
        var e;
        try {
            e = t.getBoundingClientRect()
        } catch (t) {
        }
        return e ? (e.width && e.height || (e = {
            top: e.top,
            right: e.right,
            bottom: e.bottom,
            left: e.left,
            width: e.right - e.left,
            height: e.bottom - e.top
        }), e) : c()
    }

    function c() {
        return {top: 0, bottom: 0, left: 0, right: 0, width: 0, height: 0}
    }

    function u(t, e) {
        for (var n = e; n;) {
            if (n == t) return !0;
            n = a(n)
        }
        return !1
    }

    function a(t) {
        var e = t.parentNode;
        return e && 11 == e.nodeType && e.host ? e.host : e && e.assignedSlot ? e.assignedSlot.parentNode : e
    }

    if ("object" == typeof window) {
        if ("IntersectionObserver" in window && "IntersectionObserverEntry" in window && "intersectionRatio" in window.IntersectionObserverEntry.prototype) return void ("isIntersecting" in window.IntersectionObserverEntry.prototype || Object.defineProperty(window.IntersectionObserverEntry.prototype, "isIntersecting", {
            get: function () {
                return this.intersectionRatio > 0
            }
        }));
        var l = window.document, d = [];
        e.prototype.THROTTLE_TIMEOUT = 100, e.prototype.POLL_INTERVAL = null, e.prototype.USE_MUTATION_OBSERVER = !0, e.prototype.observe = function (t) {
            if (!this._observationTargets.some(function (e) {
                return e.element == t
            })) {
                if (!t || 1 != t.nodeType) throw new Error("target must be an Element");
                this._registerInstance(), this._observationTargets.push({
                    element: t,
                    entry: null
                }), this._monitorIntersections(), this._checkForIntersections()
            }
        }, e.prototype.unobserve = function (t) {
            this._observationTargets = this._observationTargets.filter(function (e) {
                return e.element != t
            }), this._observationTargets.length || (this._unmonitorIntersections(), this._unregisterInstance())
        }, e.prototype.disconnect = function () {
            this._observationTargets = [], this._unmonitorIntersections(), this._unregisterInstance()
        }, e.prototype.takeRecords = function () {
            var t = this._queuedEntries.slice();
            return this._queuedEntries = [], t
        }, e.prototype._initThresholds = function (t) {
            var e = t || [0];
            return Array.isArray(e) || (e = [e]), e.sort().filter(function (t, e, n) {
                if ("number" != typeof t || isNaN(t) || t < 0 || t > 1) throw new Error("threshold must be a number between 0 and 1 inclusively");
                return t !== n[e - 1]
            })
        }, e.prototype._parseRootMargin = function (t) {
            var e = t || "0px", n = e.split(/\s+/).map(function (t) {
                var e = /^(-?\d*\.?\d+)(px|%)$/.exec(t);
                if (!e) throw new Error("rootMargin must be specified in pixels or percent");
                return {value: parseFloat(e[1]), unit: e[2]}
            });
            return n[1] = n[1] || n[0], n[2] = n[2] || n[0], n[3] = n[3] || n[1], n
        }, e.prototype._monitorIntersections = function () {
            this._monitoringIntersections || (this._monitoringIntersections = !0, this.POLL_INTERVAL ? this._monitoringInterval = setInterval(this._checkForIntersections, this.POLL_INTERVAL) : (i(window, "resize", this._checkForIntersections, !0), i(l, "scroll", this._checkForIntersections, !0), this.USE_MUTATION_OBSERVER && "MutationObserver" in window && (this._domObserver = new MutationObserver(this._checkForIntersections), this._domObserver.observe(l, {
                attributes: !0,
                childList: !0,
                characterData: !0,
                subtree: !0
            }))))
        }, e.prototype._unmonitorIntersections = function () {
            this._monitoringIntersections && (this._monitoringIntersections = !1, clearInterval(this._monitoringInterval), this._monitoringInterval = null, r(window, "resize", this._checkForIntersections, !0), r(l, "scroll", this._checkForIntersections, !0), this._domObserver && (this._domObserver.disconnect(), this._domObserver = null))
        }, e.prototype._checkForIntersections = function () {
            var e = this._rootIsInDom(), o = e ? this._getRootRect() : c();
            this._observationTargets.forEach(function (i) {
                var r = i.element, s = h(r), c = this._rootContainsTarget(r), u = i.entry,
                    a = e && c && this._computeTargetAndRootIntersection(r, o), l = i.entry = new t({
                        time: n(),
                        target: r,
                        boundingClientRect: s,
                        rootBounds: o,
                        intersectionRect: a
                    });
                u ? e && c ? this._hasCrossedThreshold(u, l) && this._queuedEntries.push(l) : u && u.isIntersecting && this._queuedEntries.push(l) : this._queuedEntries.push(l)
            }, this), this._queuedEntries.length && this._callback(this.takeRecords(), this)
        }, e.prototype._computeTargetAndRootIntersection = function (t, e) {
            if ("none" != window.getComputedStyle(t).display) {
                for (var n = h(t), o = n, i = a(t), r = !1; !r;) {
                    var c = null, u = 1 == i.nodeType ? window.getComputedStyle(i) : {};
                    if ("none" == u.display) return;
                    if (i == this.root || i == l ? (r = !0, c = e) : i != l.body && i != l.documentElement && "visible" != u.overflow && (c = h(i)), c && !(o = s(c, o))) break;
                    i = a(i)
                }
                return o
            }
        }, e.prototype._getRootRect = function () {
            var t;
            if (this.root) t = h(this.root); else {
                var e = l.documentElement, n = l.body;
                t = {
                    top: 0,
                    left: 0,
                    right: e.clientWidth || n.clientWidth,
                    width: e.clientWidth || n.clientWidth,
                    bottom: e.clientHeight || n.clientHeight,
                    height: e.clientHeight || n.clientHeight
                }
            }
            return this._expandRectByRootMargin(t)
        }, e.prototype._expandRectByRootMargin = function (t) {
            var e = this._rootMarginValues.map(function (e, n) {
                return "px" == e.unit ? e.value : e.value * (n % 2 ? t.width : t.height) / 100
            }), n = {top: t.top - e[0], right: t.right + e[1], bottom: t.bottom + e[2], left: t.left - e[3]};
            return n.width = n.right - n.left, n.height = n.bottom - n.top, n
        }, e.prototype._hasCrossedThreshold = function (t, e) {
            var n = t && t.isIntersecting ? t.intersectionRatio || 0 : -1,
                o = e.isIntersecting ? e.intersectionRatio || 0 : -1;
            if (n !== o) for (var i = 0; i < this.thresholds.length; i++) {
                var r = this.thresholds[i];
                if (r == n || r == o || r < n != r < o) return !0
            }
        }, e.prototype._rootIsInDom = function () {
            return !this.root || u(l, this.root)
        }, e.prototype._rootContainsTarget = function (t) {
            return u(this.root || l, t)
        }, e.prototype._registerInstance = function () {
            d.indexOf(this) < 0 && d.push(this)
        }, e.prototype._unregisterInstance = function () {
            var t = d.indexOf(this);
            -1 != t && d.splice(t, 1)
        }, window.IntersectionObserver = e, window.IntersectionObserverEntry = t
    }
}();
!function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = t || self).lozad = e()
}(this, function () {
    "use strict";

    function t(t) {
        t.setAttribute("data-loaded", !0)
    }

    var e = "undefined" != typeof document && document.documentMode, r = {
        rootMargin: "0px", threshold: 0, load: function (t) {
            if ("picture" === t.nodeName.toLowerCase()) {
                var r = document.createElement("img");
                e && t.getAttribute("data-iesrc") && (r.src = t.getAttribute("data-iesrc")), t.getAttribute("data-alt") && (r.alt = t.getAttribute("data-alt")), t.append(r)
            }
            if ("video" === t.nodeName.toLowerCase() && !t.getAttribute("data-src") && t.children) {
                for (var a = t.children, o = void 0, i = 0; i <= a.length - 1; i++) (o = a[i].getAttribute("data-src")) && (a[i].src = o);
                t.load()
            }
            if (t.getAttribute("data-src") && (t.src = t.getAttribute("data-src")), t.getAttribute("data-srcset") && t.setAttribute("srcset", t.getAttribute("data-srcset")), t.getAttribute("data-background-image")) t.style.backgroundImage = "url('" + t.getAttribute("data-background-image").split(",").join("'),url('") + "')"; else if (t.getAttribute("data-background-image-set")) {
                var n = t.getAttribute("data-background-image-set").split(","),
                    d = n[0].substr(0, n[0].indexOf(" ")) || n[0];
                d = -1 === d.indexOf("url(") ? "url(" + d + ")" : d, 1 === n.length ? t.style.backgroundImage = d : t.setAttribute("style", (t.getAttribute("style") || "") + "background-image: " + d + "; background-image: -webkit-image-set(" + n + "); background-image: image-set(" + n + ")")
            }
            t.getAttribute("data-toggle-class") && t.classList.toggle(t.getAttribute("data-toggle-class"))
        }, loaded: function () {
        }
    }, a = function (t) {
        return "true" === t.getAttribute("data-loaded")
    };
    return function () {
        var e, o, i = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : ".lozad",
            n = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {}, d = Object.assign({}, r, n),
            u = d.root, s = d.rootMargin, g = d.threshold, c = d.load, l = d.loaded, b = void 0;
        return "undefined" != typeof window && window.IntersectionObserver && (b = new IntersectionObserver((e = c, o = l, function (r, i) {
            r.forEach(function (r) {
                (0 < r.intersectionRatio || r.isIntersecting) && (i.unobserve(r.target), a(r.target) || (e(r.target), t(r.target), o(r.target)))
            })
        }), {root: u, rootMargin: s, threshold: g})), {
            observe: function () {
                for (var e = function (t) {
                    var e = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : document;
                    return t instanceof Element ? [t] : t instanceof NodeList ? t : e.querySelectorAll(t)
                }(i, u), r = 0; r < e.length; r++) a(e[r]) || (b ? b.observe(e[r]) : (c(e[r]), t(e[r]), l(e[r])))
            }, triggerLoad: function (e) {
                a(e) || (c(e), t(e), l(e))
            }, observer: b
        }
    }
});

function getBaseType(e) {
    return Object.prototype.toString.apply(e).slice(8, -1)
}

function eachObj(e, t) {
    for (var n in e) t(e[n], n, e)
}

function getKeys(e, t) {
    var n = [];
    return eachObj(e, function (e, t) {
        n.push(t)
    }), n.sort(t)
}

function extend(e, t) {
    return eachObj(t, function (t, n) {
        e[n] = t
    }), e
}

function getPosition(e) {
    var t = 0, n = 0;
    if (!e.tagName) return console.warn("element must be a HTML element object"), {x: null, y: null};
    for (; e !== document.body;) t += e.offsetLeft, n += e.offsetTop, e = e.offsetParent;
    return {x: t, y: n}
}

!function (t) {
    function s(t) {
        this.ele = t, this.record = [], this.index = 0, this.dir = 1, this.status = !1
    }

    s.prototype = {
        _toggleClass: function (t, s) {
            var i = this;
            classArr = t.split(" "), classArr.forEach(function (t) {
                i.ele.classList.toggle(t)
            }), s && setTimeout(s, 10)
        }, _transfromClass: function (t, s) {
            var i = this;
            this.ele.addEventListener("transitionend", function t(e) {
                i.ele === e.target && (s(), i.ele.removeEventListener("transitionend", t))
            }), this._toggleClass(t)
        }, _animationClass: function (t, s) {
            var i = this;
            this.ele.addEventListener("animationend", function t(e) {
                i.ele === e.target && (s(), i.ele.removeEventListener("animationend", t))
            }), this._toggleClass(t)
        }, _toggle: function () {
            var t = this.record[this.index];
            if (this.index === this.record.length || -1 === this.index) return this.end && this.end(), this.index = this.dir > 0 ? this.index - 1 : 0, this.dir *= -1, void (this.status = !1);
            switch (t.type) {
                case"class":
                    this._toggleClass(t.className, this._toggle.bind(this));
                    break;
                case"transfrom":
                    this._transfromClass(t.className, this._toggle.bind(this));
                    break;
                case"animation":
                    this._animationClass(t.className, this._toggle.bind(this))
            }
            this.index += this.dir
        }, base: function (t) {
            return this.record.push({className: t || "js-open", type: "class"}), this
        }, transfrom: function (t) {
            return this.record.push({className: t, type: "transfrom"}), this
        }, animation: function (t) {
            return this.record.push({className: t, type: "animation"}), this
        }, toggle: function () {
            this.status || (0 !== this.index && this.index !== this.record.length - 1 || (this.status = !0), this._toggle())
        }, lastStart: function () {
            var t = this;
            return this.status = !1, this.index = this.record.length - 1, this.dir = -1, this.record.forEach(function (s) {
                t.ele.classList.add(s.className)
            }), this
        }, end: function (t) {
            return this.end = t, this
        }
    }, t.Pack = s
}(window);
!function (t) {
    function i(t) {
        var i = t.time, e = t.now, n = t.aims, r = t.spendTime, o = e + 60 * (n - e) / (i - r);
        return n - e > 0 ? o >= n ? n : o : o <= n ? n : o
    }

    function e() {
        this.record = [], this.timeoutMap = {}, this.listeners = {
            start: [],
            frame: [],
            end: []
        }, this.frames = 0, this._init()
    }

    lozad(".lozad", {rootMargin: "10px 0px", threshold: .1}).observe(), e.prototype = {
        _init: function () {
            return this.index = 0, this.nowIndex = 0, this.timer = null, this.time = 0, this.startTime = null, this.record.forEach(function (t) {
                eachObj(t, function (i, e) {
                    ~e.indexOf("_") || (t[e].now = t[e].from)
                })
            }), this
        }, _getSpendTime: function () {
            var t, i = this.time, e = this.nowIndex;
            return t = this.record.reduce(function (t, i, n) {
                return n < e && (t += i._time), t
            }, 0), i - t
        }, _request: function (t) {
            var i = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
            return this.timer = i(t), this
        }, _cancel: function () {
            return (window.cancelAnimationFrame || window.mozCancelAnimationFrame || window.webkitCancelAnimationFrame || window.msCancelAnimationFrame)(this.timer), this
        }, _algorithm: function (t) {
            var e = t.type || "linear", n = t.time || 1e3, r = t.now, o = t.aims || 0, s = t.spendTime || 0;
            switch (e) {
                case"linear":
                    return i({time: n, now: r, aims: o, spendTime: s})
            }
        }, _emit: function (t, i) {
            return this.listeners[t] && this.listeners[t].forEach(function (t) {
                t(i)
            }), this
        }, on: function (t, i) {
            return ~getKeys(this.listeners).indexOf(t) && i && this.listeners[t].push(i), this
        }, from: function (t) {
            t = t || {};
            var i = this.record[this.index] || {};
            return eachObj(t, function (t, e) {
                i[e] = {from: t, now: t, to: 0}
            }), this.record[this.index] = i, this
        }, to: function (t) {
            t = t || {};
            var i = this.record[this.index] || {};
            return eachObj(t, function (t, e) {
                i[e] = extend(i[e] || {from: 0, now: 0}, {to: t})
            }), this.record[this.index] = i, this
        }, transition: function (t) {
            var i, e;
            "string" == typeof t ? e = t : (i = t.type || "linear", e = t.time || 1e3);
            var n = this.record[this.index] || {};
            return extend(n, {_time: e, _type: i}), this.record[this.index] = n, this
        }, next: function () {
            return this.index = this.record.length, this
        }, timeout: function (t) {
            if (t && "number" == typeof t) {
                var i = 0 === this.record.length ? -1 : this.index;
                this.timeoutMap[i] = null != this.timeoutMap[i] ? this.timeoutMap[i] + t : t
            }
            return this
        }, start: function () {
            var t = this.record, i = this;
            return this.next()._emit("start")._request(function e() {
                var n = t[i.nowIndex], r = {};
                if (!i.startTime && i.timeoutMap[-1]) return i.startTime = (new Date).getTime(), i.pause(), void setTimeout(function () {
                    i._request(e)
                }, i.timeoutMap[-1]);
                if (i.time === n._time) {
                    var o = i.timeoutMap[i.nowIndex];
                    if (i.time = 0, i.nowIndex++, o) return i.pause(), void setTimeout(function () {
                        i._request(e)
                    }, o);
                    n = t[i.nowIndex]
                }
                if (i.nowIndex === t.length) return void i._emit("end").close();
                eachObj(n, function (t, e) {
                    if (!~e.indexOf("_")) {
                        var o = i._algorithm({type: n._type, time: n._time, now: t.now, aims: t.to, spendTime: i.time});
                        r[e] = o, n[e].now = o, o === t.to && (i.time = n._time)
                    }
                }), i.time != n._time && (i.time += 60), i._emit("frame", r), i.frames++, i._request(e)
            })
        }, pause: function () {
            return this._cancel()
        }, close: function () {
            return this._cancel()._init()
        }
    }, t.Amt = e
}(window);
window.addEventListener("load", function () {
    !function () {
        var e = document.getElementById("page");
        document.getElementById("page-loading").classList.add("js-hidden"), e.classList.remove("js-hidden")
    }()
});
window.addEventListener("load", function () {
    !function () {
        function e() {
            var e = window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop;
            t.classList[e > 30 ? "add" : "remove"]("page__header--small")
        }

        var t = document.getElementById("page-header");
        t && document.addEventListener("scroll", e)
    }(), function () {
        var e = document.querySelector("button.page__menu-btn"), t = document.querySelector("nav.page__nav");
        if (e && t) {
            var a = new Pack(t);
            a.base("js-open").transfrom("page__nav--open"), e.addEventListener("click", function () {
                a.toggle()
            })
        }
    }(), function () {
        var e = document.getElementById("page-header");
        if (e) {
            var t = e.querySelector(".info__title");
            desc = e.querySelector(".info__desc"), t && new Pack(t).base("js-ease-out-leave-active").base("js-ease-out-leave").transfrom("js-ease-out-enter-active").end(function () {
                ["js-ease-out-enter", "js-ease-out-enter-active", "js-ease-out-leave", "js-ease-out-leave-active"].forEach(function (e) {
                    desc.classList.remove(e)
                })
            }).toggle(), desc && new Pack(desc).base("js-ease-out-leave-active").base("js-ease-out-leave").transfrom("js-ease-out-enter-active").end(function () {
                ["js-ease-out-enter", "js-ease-out-enter-active", "js-ease-out-leave", "js-ease-out-leave-active"].forEach(function (e) {
                    desc.classList.remove(e)
                })
            }).toggle()
        }
    }()
});
window.addEventListener("load", function () {
    !function () {
        function t() {
            var t = window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop,
                e = n.classList.contains("back-top--hidden") && n.classList.contains("js-hidden");
            (t > 350 && e || t < 350 && !e) && o.toggle()
        }

        var n = document.getElementById("back-top"), o = new Pack(n);
        n && (o.transfrom("back-top--hidden").base("js-hidden").lastStart(), t(), document.addEventListener("scroll", t), n.addEventListener("click", function () {
            (new Amt).from({top: window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop}).to({top: 0}).transition(1e3).on("frame", function (t) {
                window.scrollTo(0, t.top)
            }).start()
        }))
    }()
});
window.addEventListener("load", function () {
    function e(e) {
        function n() {
            o(t), t = i(e.bind(null, function () {
                document.removeEventListener("scroll", n)
            }))
        }

        var t = null,
            i = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame,
            o = window.cancelAnimationFrame || window.mozCancelAnimationFrame;
        document.addEventListener("scroll", n), n()
    }

    window._skappPostAnimation = function () {
        document.querySelectorAll("article.page__mini-article").forEach(function (n) {
            if (!n.parentElement.parentElement.classList.contains("js-hidden")) {
                var t = getPosition(n), i = new Pack(n);
                i.base("js-ease-out-leave-active").base("js-ease-out-leave").transfrom("js-ease-out-enter-active").end(function () {
                    ["js-ease-out-enter", "js-ease-out-enter-active", "js-ease-out-leave", "js-ease-out-leave-active"].forEach(function (e) {
                        n.classList.remove(e)
                    })
                }), e(function (e) {
                    t.y - window.scrollY - document.documentElement.clientHeight < 50 && (e(), i.toggle())
                })
            }
        })
    }, window._skappPostAnimation()
});
