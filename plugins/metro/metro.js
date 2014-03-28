       (function (bW, c) {
            var a2, ap, aG = bW.document,
                j = bW.location,
                bR = bW.jQuery,
                X = bW.$,
                B = {}, b0 = [],
                aV = "1.9.0",
                f = b0.concat,
                aO = b0.push,
                bY = b0.slice,
                k = b0.indexOf,
                bT = B.toString,
                bw = B.hasOwnProperty,
                p = aV.trim,
                al = function (e, b1) {
                    return new al.fn.init(e, b1, a2)
                }, ak = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
                bh = /\S+/g,
                Q = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
                bv = /^(?:(<[\w\W]+>)[^>]*|#([\w-]*))$/,
                am = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
                bP = /^[\],:{}\s]*$/,
                bd = /(?:^|:|,)(?:\s*\[)+/g,
                bo = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
                y = /"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,
                aW = /^-ms-/,
                u = /-([\da-z])/gi,
                bO = function (e, b1) {
                    return b1.toUpperCase()
                }, g = function () {
                    if (aG.addEventListener) {
                        aG.removeEventListener("DOMContentLoaded", g, false);
                        al.ready()
                    } else {
                        if (aG.readyState === "complete") {
                            aG.detachEvent("onreadystatechange", g);
                            al.ready()
                        }
                    }
                };
            al.fn = al.prototype = {
                jquery: aV,
                constructor: al,
                init: function (b2, e, b4) {
                    var b3, b1;
                    if (!b2) {
                        return this
                    }
                    if (typeof b2 === "string") {
                        if (b2.charAt(0) === "<" && b2.charAt(b2.length - 1) === ">" && b2.length >= 3) {
                            b3 = [null, b2, null]
                        } else {
                            b3 = bv.exec(b2)
                        } if (b3 && (b3[1] || !e)) {
                            if (b3[1]) {
                                e = e instanceof al ? e[0] : e;
                                al.merge(this, al.parseHTML(b3[1], e && e.nodeType ? e.ownerDocument || e : aG, true));
                                if (am.test(b3[1]) && al.isPlainObject(e)) {
                                    for (b3 in e) {
                                        if (al.isFunction(this[b3])) {
                                            this[b3](e[b3])
                                        } else {
                                            this.attr(b3, e[b3])
                                        }
                                    }
                                }
                                return this
                            } else {
                                b1 = aG.getElementById(b3[2]);
                                if (b1 && b1.parentNode) {
                                    if (b1.id !== b3[2]) {
                                        return b4.find(b2)
                                    }
                                    this.length = 1;
                                    this[0] = b1
                                }
                                this.context = aG;
                                this.selector = b2;
                                return this
                            }
                        } else {
                            if (!e || e.jquery) {
                                return (e || b4).find(b2)
                            } else {
                                return this.constructor(e).find(b2)
                            }
                        }
                    } else {
                        if (b2.nodeType) {
                            this.context = this[0] = b2;
                            this.length = 1;
                            return this
                        } else {
                            if (al.isFunction(b2)) {
                                return b4.ready(b2)
                            }
                        }
                    } if (b2.selector !== c) {
                        this.selector = b2.selector;
                        this.context = b2.context
                    }
                    return al.makeArray(b2, this)
                },
                selector: "",
                length: 0,
                size: function () {
                    return this.length
                },
                toArray: function () {
                    return bY.call(this)
                },
                get: function (e) {
                    return e == null ? this.toArray() : (e < 0 ? this[this.length + e] : this[e])
                },
                pushStack: function (e) {
                    var b1 = al.merge(this.constructor(), e);
                    b1.prevObject = this;
                    b1.context = this.context;
                    return b1
                },
                each: function (b1, e) {
                    return al.each(this, b1, e)
                },
                ready: function (e) {
                    al.ready.promise().done(e);
                    return this
                },
                slice: function () {
                    return this.pushStack(bY.apply(this, arguments))
                },
                first: function () {
                    return this.eq(0)
                },
                last: function () {
                    return this.eq(-1)
                },
                eq: function (b1) {
                    var b2 = this.length,
                        e = +b1 + (b1 < 0 ? b2 : 0);
                    return this.pushStack(e >= 0 && e < b2 ? [this[e]] : [])
                },
                map: function (e) {
                    return this.pushStack(al.map(this, function (b1, b2) {
                        return e.call(b1, b2, b1)
                    }))
                },
                end: function () {
                    return this.prevObject || this.constructor(null)
                },
                push: aO,
                sort: [].sort,
                splice: [].splice
            };
            al.fn.init.prototype = al.fn;
            al.extend = al.fn.extend = function () {
                var b9, b1, b4, e, b6, b7, b5 = arguments[0] || {}, b3 = 1,
                    b2 = arguments.length,
                    b8 = false;
                if (typeof b5 === "boolean") {
                    b8 = b5;
                    b5 = arguments[1] || {};
                    b3 = 2
                }
                if (typeof b5 !== "object" && !al.isFunction(b5)) {
                    b5 = {}
                }
                if (b2 === b3) {
                    b5 = this;
                    --b3
                }
                for (; b3 < b2; b3++) {
                    if ((b9 = arguments[b3]) != null) {
                        for (b1 in b9) {
                            b4 = b5[b1];
                            e = b9[b1];
                            if (b5 === e) {
                                continue
                            }
                            if (b8 && e && (al.isPlainObject(e) || (b6 = al.isArray(e)))) {
                                if (b6) {
                                    b6 = false;
                                    b7 = b4 && al.isArray(b4) ? b4 : []
                                } else {
                                    b7 = b4 && al.isPlainObject(b4) ? b4 : {}
                                }
                                b5[b1] = al.extend(b8, b7, e)
                            } else {
                                if (e !== c) {
                                    b5[b1] = e
                                }
                            }
                        }
                    }
                }
                return b5
            };
            al.extend({
                noConflict: function (e) {
                    if (bW.$ === al) {
                        bW.$ = X
                    }
                    if (e && bW.jQuery === al) {
                        bW.jQuery = bR
                    }
                    return al
                },
                isReady: false,
                readyWait: 1,
                holdReady: function (e) {
                    if (e) {
                        al.readyWait++
                    } else {
                        al.ready(true)
                    }
                },
                ready: function (e) {
                    if (e === true ? --al.readyWait : al.isReady) {
                        return
                    }
                    if (!aG.body) {
                        return setTimeout(al.ready)
                    }
                    al.isReady = true;
                    if (e !== true && --al.readyWait > 0) {
                        return
                    }
                    ap.resolveWith(aG, [al]);
                    if (al.fn.trigger) {
                        al(aG).trigger("ready").off("ready")
                    }
                },
                isFunction: function (e) {
                    return al.type(e) === "function"
                },
                isArray: Array.isArray || function (e) {
                    return al.type(e) === "array"
                },
                isWindow: function (e) {
                    return e != null && e == e.window
                },
                isNumeric: function (e) {
                    return !isNaN(parseFloat(e)) && isFinite(e)
                },
                type: function (e) {
                    if (e == null) {
                        return String(e)
                    }
                    return typeof e === "object" || typeof e === "function" ? B[bT.call(e)] || "object" : typeof e
                },
                isPlainObject: function (b1) {
                    if (!b1 || al.type(b1) !== "object" || b1.nodeType || al.isWindow(b1)) {
                        return false
                    }
                    try {
                        if (b1.constructor && !bw.call(b1, "constructor") && !bw.call(b1.constructor.prototype, "isPrototypeOf")) {
                            return false
                        }
                    } catch (e) {
                        return false
                    }
                    var b2;
                    for (b2 in b1) {}
                    return b2 === c || bw.call(b1, b2)
                },
                isEmptyObject: function (b1) {
                    var e;
                    for (e in b1) {
                        return false
                    }
                    return true
                },
                error: function (e) {
                    throw new Error(e)
                },
                parseHTML: function (b1, b4, e) {
                    if (!b1 || typeof b1 !== "string") {
                        return null
                    }
                    if (typeof b4 === "boolean") {
                        e = b4;
                        b4 = false
                    }
                    b4 = b4 || aG;
                    var b3 = am.exec(b1),
                        b2 = !e && [];
                    if (b3) {
                        return [b4.createElement(b3[1])]
                    }
                    b3 = al.buildFragment([b1], b4, b2);
                    if (b2) {
                        al(b2).remove()
                    }
                    return al.merge([], b3.childNodes)
                },
                parseJSON: function (e) {
                    if (bW.JSON && bW.JSON.parse) {
                        return bW.JSON.parse(e)
                    }
                    if (e === null) {
                        return e
                    }
                    if (typeof e === "string") {
                        e = al.trim(e);
                        if (e) {
                            if (bP.test(e.replace(bo, "@").replace(y, "]").replace(bd, ""))) {
                                return (new Function("return " + e))()
                            }
                        }
                    }
                    al.error("Invalid JSON: " + e)
                },
                parseXML: function (e) {
                    var b2, b3;
                    if (!e || typeof e !== "string") {
                        return null
                    }
                    try {
                        if (bW.DOMParser) {
                            b3 = new DOMParser();
                            b2 = b3.parseFromString(e, "text/xml")
                        } else {
                            b2 = new ActiveXObject("Microsoft.XMLDOM");
                            b2.async = "false";
                            b2.loadXML(e)
                        }
                    } catch (b1) {
                        b2 = c
                    }
                    if (!b2 || !b2.documentElement || b2.getElementsByTagName("parsererror").length) {
                        al.error("Invalid XML: " + e)
                    }
                    return b2
                },
                noop: function () {},
                globalEval: function (e) {
                    if (e && al.trim(e)) {
                        (bW.execScript || function (b1) {
                            bW["eval"].call(bW, b1)
                        })(e)
                    }
                },
                camelCase: function (e) {
                    return e.replace(aW, "ms-").replace(u, bO)
                },
                nodeName: function (b1, e) {
                    return b1.nodeName && b1.nodeName.toLowerCase() === e.toLowerCase()
                },
                each: function (b2, b3, b5) {
                    var b1, b6 = 0,
                        e = b2.length,
                        b4 = ba(b2);
                    if (b5) {
                        if (b4) {
                            for (; b6 < e; b6++) {
                                b1 = b3.apply(b2[b6], b5);
                                if (b1 === false) {
                                    break
                                }
                            }
                        } else {
                            for (b6 in b2) {
                                b1 = b3.apply(b2[b6], b5);
                                if (b1 === false) {
                                    break
                                }
                            }
                        }
                    } else {
                        if (b4) {
                            for (; b6 < e; b6++) {
                                b1 = b3.call(b2[b6], b6, b2[b6]);
                                if (b1 === false) {
                                    break
                                }
                            }
                        } else {
                            for (b6 in b2) {
                                b1 = b3.call(b2[b6], b6, b2[b6]);
                                if (b1 === false) {
                                    break
                                }
                            }
                        }
                    }
                    return b2
                },
                trim: p && !p.call("\uFEFF\xA0") ? function (e) {
                    return e == null ? "" : p.call(e)
                } : function (e) {
                    return e == null ? "" : (e + "").replace(Q, "")
                },
                makeArray: function (b2, b1) {
                    var e = b1 || [];
                    if (b2 != null) {
                        if (ba(Object(b2))) {
                            al.merge(e, typeof b2 === "string" ? [b2] : b2)
                        } else {
                            aO.call(e, b2)
                        }
                    }
                    return e
                },
                inArray: function (b1, b3, e) {
                    var b2;
                    if (b3) {
                        if (k) {
                            return k.call(b3, b1, e)
                        }
                        b2 = b3.length;
                        e = e ? e < 0 ? Math.max(0, b2 + e) : e : 0;
                        for (; e < b2; e++) {
                            if (e in b3 && b3[e] === b1) {
                                return e
                            }
                        }
                    }
                    return -1
                },
                merge: function (b1, b4) {
                    var b2 = b4.length,
                        e = b1.length,
                        b3 = 0;
                    if (typeof b2 === "number") {
                        for (; b3 < b2; b3++) {
                            b1[e++] = b4[b3]
                        }
                    } else {
                        while (b4[b3] !== c) {
                            b1[e++] = b4[b3++]
                        }
                    }
                    b1.length = e;
                    return b1
                },
                grep: function (b5, b3, b4) {
                    var b2, b6 = [],
                        e = 0,
                        b1 = b5.length;
                    b4 = !! b4;
                    for (; e < b1; e++) {
                        b2 = !! b3(b5[e], e);
                        if (b4 !== b2) {
                            b6.push(b5[e])
                        }
                    }
                    return b6
                },
                map: function (b7, b4, b5) {
                    var b3, b1 = 0,
                        b2 = b7.length,
                        b6 = ba(b7),
                        e = [];
                    if (b6) {
                        for (; b1 < b2; b1++) {
                            b3 = b4(b7[b1], b1, b5);
                            if (b3 != null) {
                                e[e.length] = b3
                            }
                        }
                    } else {
                        for (b1 in b7) {
                            b3 = b4(b7[b1], b1, b5);
                            if (b3 != null) {
                                e[e.length] = b3
                            }
                        }
                    }
                    return f.apply([], e)
                },
                guid: 1,
                proxy: function (b1, e) {
                    var b4, b2, b3;
                    if (typeof e === "string") {
                        b4 = b1[e];
                        e = b1;
                        b1 = b4
                    }
                    if (!al.isFunction(b1)) {
                        return c
                    }
                    b2 = bY.call(arguments, 2);
                    b3 = function () {
                        return b1.apply(e || this, b2.concat(bY.call(arguments)))
                    };
                    b3.guid = b1.guid = b1.guid || al.guid++;
                    return b3
                },
                access: function (b4, b5, b7, b6, b2, b9, b8) {
                    var b1 = 0,
                        e = b4.length,
                        b3 = b7 == null;
                    if (al.type(b7) === "object") {
                        b2 = true;
                        for (b1 in b7) {
                            al.access(b4, b5, b1, b7[b1], true, b9, b8)
                        }
                    } else {
                        if (b6 !== c) {
                            b2 = true;
                            if (!al.isFunction(b6)) {
                                b8 = true
                            }
                            if (b3) {
                                if (b8) {
                                    b5.call(b4, b6);
                                    b5 = null
                                } else {
                                    b3 = b5;
                                    b5 = function (cb, ca, cc) {
                                        return b3.call(al(cb), cc)
                                    }
                                }
                            }
                            if (b5) {
                                for (; b1 < e; b1++) {
                                    b5(b4[b1], b7, b8 ? b6 : b6.call(b4[b1], b1, b5(b4[b1], b7)))
                                }
                            }
                        }
                    }
                    return b2 ? b4 : b3 ? b5.call(b4) : e ? b5(b4[0], b7) : b9
                },
                now: function () {
                    return (new Date()).getTime()
                }
            });
            al.ready.promise = function (b1) {
                if (!ap) {
                    ap = al.Deferred();
                    if (aG.readyState === "complete") {
                        setTimeout(al.ready)
                    } else {
                        if (aG.addEventListener) {
                            aG.addEventListener("DOMContentLoaded", g, false);
                            bW.addEventListener("load", al.ready, false)
                        } else {
                            aG.attachEvent("onreadystatechange", g);
                            bW.attachEvent("onload", al.ready);
                            var e = false;
                            try {
                                e = bW.frameElement == null && aG.documentElement
                            } catch (b3) {}
                            if (e && e.doScroll) {
                                (function b2() {
                                    if (!al.isReady) {
                                        try {
                                            e.doScroll("left")
                                        } catch (b4) {
                                            return setTimeout(b2, 50)
                                        }
                                        al.ready()
                                    }
                                })()
                            }
                        }
                    }
                }
                return ap.promise(b1)
            };
            al.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (b1, e) {
                B["[object " + e + "]"] = e.toLowerCase()
            });

            function ba(b1) {
                var e = b1.length,
                    b2 = al.type(b1);
                if (al.isWindow(b1)) {
                    return false
                }
                if (b1.nodeType === 1 && e) {
                    return true
                }
                return b2 === "array" || b2 !== "function" && (e === 0 || typeof e === "number" && e > 0 && (e - 1) in b1)
            }
            a2 = al(aG);
            var G = {};

            function bm(b1) {
                var e = G[b1] = {};
                al.each(b1.match(bh) || [], function (b3, b2) {
                    e[b2] = true
                });
                return e
            }
            al.Callbacks = function (ca) {
                ca = typeof ca === "string" ? (G[ca] || bm(ca)) : al.extend({}, ca);
                var b2, b4, b3, b1, b5, b6, b7 = [],
                    b8 = !ca.once && [],
                    e = function (cb) {
                        b2 = ca.memory && cb;
                        b4 = true;
                        b6 = b1 || 0;
                        b1 = 0;
                        b5 = b7.length;
                        b3 = true;
                        for (; b7 && b6 < b5; b6++) {
                            if (b7[b6].apply(cb[0], cb[1]) === false && ca.stopOnFalse) {
                                b2 = false;
                                break
                            }
                        }
                        b3 = false;
                        if (b7) {
                            if (b8) {
                                if (b8.length) {
                                    e(b8.shift())
                                }
                            } else {
                                if (b2) {
                                    b7 = []
                                } else {
                                    b9.disable()
                                }
                            }
                        }
                    }, b9 = {
                        add: function () {
                            if (b7) {
                                var cc = b7.length;
                                (function cb(cd) {
                                    al.each(cd, function (cf, ce) {
                                        var cg = al.type(ce);
                                        if (cg === "function") {
                                            if (!ca.unique || !b9.has(ce)) {
                                                b7.push(ce)
                                            }
                                        } else {
                                            if (ce && ce.length && cg !== "string") {
                                                cb(ce)
                                            }
                                        }
                                    })
                                })(arguments);
                                if (b3) {
                                    b5 = b7.length
                                } else {
                                    if (b2) {
                                        b1 = cc;
                                        e(b2)
                                    }
                                }
                            }
                            return this
                        },
                        remove: function () {
                            if (b7) {
                                al.each(arguments, function (cd, cb) {
                                    var cc;
                                    while ((cc = al.inArray(cb, b7, cc)) > -1) {
                                        b7.splice(cc, 1);
                                        if (b3) {
                                            if (cc <= b5) {
                                                b5--
                                            }
                                            if (cc <= b6) {
                                                b6--
                                            }
                                        }
                                    }
                                })
                            }
                            return this
                        },
                        has: function (cb) {
                            return al.inArray(cb, b7) > -1
                        },
                        empty: function () {
                            b7 = [];
                            return this
                        },
                        disable: function () {
                            b7 = b8 = b2 = c;
                            return this
                        },
                        disabled: function () {
                            return !b7
                        },
                        lock: function () {
                            b8 = c;
                            if (!b2) {
                                b9.disable()
                            }
                            return this
                        },
                        locked: function () {
                            return !b8
                        },
                        fireWith: function (cc, cb) {
                            cb = cb || [];
                            cb = [cc, cb.slice ? cb.slice() : cb];
                            if (b7 && (!b4 || b8)) {
                                if (b3) {
                                    b8.push(cb)
                                } else {
                                    e(cb)
                                }
                            }
                            return this
                        },
                        fire: function () {
                            b9.fireWith(this, arguments);
                            return this
                        },
                        fired: function () {
                            return !!b4
                        }
                    };
                return b9
            };
            al.extend({
                Deferred: function (b4) {
                    var b3 = [
                        ["resolve", "done", al.Callbacks("once memory"), "resolved"],
                        ["reject", "fail", al.Callbacks("once memory"), "rejected"],
                        ["notify", "progress", al.Callbacks("memory")]
                    ],
                        e = "pending",
                        b1 = {
                            state: function () {
                                return e
                            },
                            always: function () {
                                b2.done(arguments).fail(arguments);
                                return this
                            },
                            then: function () {
                                var b5 = arguments;
                                return al.Deferred(function (b6) {
                                    al.each(b3, function (b8, b7) {
                                        var ca = b7[0],
                                            b9 = al.isFunction(b5[b8]) && b5[b8];
                                        b2[b7[1]](function () {
                                            var cb = b9 && b9.apply(this, arguments);
                                            if (cb && al.isFunction(cb.promise)) {
                                                cb.promise().done(b6.resolve).fail(b6.reject).progress(b6.notify)
                                            } else {
                                                b6[ca + "With"](this === b1 ? b6.promise() : this, b9 ? [cb] : arguments)
                                            }
                                        })
                                    });
                                    b5 = null
                                }).promise()
                            },
                            promise: function (b5) {
                                return b5 != null ? al.extend(b5, b1) : b1
                            }
                        }, b2 = {};
                    b1.pipe = b1.then;
                    al.each(b3, function (b6, b5) {
                        var b8 = b5[2],
                            b7 = b5[3];
                        b1[b5[1]] = b8.add;
                        if (b7) {
                            b8.add(function () {
                                e = b7
                            }, b3[b6 ^ 1][2].disable, b3[2][2].lock)
                        }
                        b2[b5[0]] = function () {
                            b2[b5[0] + "With"](this === b2 ? b1 : this, arguments);
                            return this
                        };
                        b2[b5[0] + "With"] = b8.fireWith
                    });
                    b1.promise(b2);
                    if (b4) {
                        b4.call(b2, b2)
                    }
                    return b2
                },
                when: function (b3) {
                    var b1 = 0,
                        b6 = bY.call(arguments),
                        b4 = b6.length,
                        e = b4 !== 1 || (b3 && al.isFunction(b3.promise)) ? b4 : 0,
                        b9 = e === 1 ? b3 : al.Deferred(),
                        b2 = function (cb, cc, ca) {
                            return function (cd) {
                                cc[cb] = this;
                                ca[cb] = arguments.length > 1 ? bY.call(arguments) : cd;
                                if (ca === b8) {
                                    b9.notifyWith(cc, ca)
                                } else {
                                    if (!(--e)) {
                                        b9.resolveWith(cc, ca)
                                    }
                                }
                            }
                        }, b8, b5, b7;
                    if (b4 > 1) {
                        b8 = new Array(b4);
                        b5 = new Array(b4);
                        b7 = new Array(b4);
                        for (; b1 < b4; b1++) {
                            if (b6[b1] && al.isFunction(b6[b1].promise)) {
                                b6[b1].promise().done(b2(b1, b7, b6)).fail(b9.reject).progress(b2(b1, b5, b8))
                            } else {
                                --e
                            }
                        }
                    }
                    if (!e) {
                        b9.resolveWith(b7, b6)
                    }
                    return b9.promise()
                }
            });
            al.support = (function () {
                var cb, ca, b8, b9, b2, b7, b6, b4, b1, b3, e = aG.createElement("div");
                e.setAttribute("className", "t");
                e.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>";
                ca = e.getElementsByTagName("*");
                b8 = e.getElementsByTagName("a")[0];
                if (!ca || !b8 || !ca.length) {
                    return {}
                }
                b9 = aG.createElement("select");
                b2 = b9.appendChild(aG.createElement("option"));
                b7 = e.getElementsByTagName("input")[0];
                b8.style.cssText = "top:1px;float:left;opacity:.5";
                cb = {
                    getSetAttribute: e.className !== "t",
                    leadingWhitespace: e.firstChild.nodeType === 3,
                    tbody: !e.getElementsByTagName("tbody").length,
                    htmlSerialize: !! e.getElementsByTagName("link").length,
                    style: /top/.test(b8.getAttribute("style")),
                    hrefNormalized: b8.getAttribute("href") === "/a",
                    opacity: /^0.5/.test(b8.style.opacity),
                    cssFloat: !! b8.style.cssFloat,
                    checkOn: !! b7.value,
                    optSelected: b2.selected,
                    enctype: !! aG.createElement("form").enctype,
                    html5Clone: aG.createElement("nav").cloneNode(true).outerHTML !== "<:nav></:nav>",
                    boxModel: aG.compatMode === "CSS1Compat",
                    deleteExpando: true,
                    noCloneEvent: true,
                    inlineBlockNeedsLayout: false,
                    shrinkWrapBlocks: false,
                    reliableMarginRight: true,
                    boxSizingReliable: true,
                    pixelPosition: false
                };
                b7.checked = true;
                cb.noCloneChecked = b7.cloneNode(true).checked;
                b9.disabled = true;
                cb.optDisabled = !b2.disabled;
                try {
                    delete e.test
                } catch (b5) {
                    cb.deleteExpando = false
                }
                b7 = aG.createElement("input");
                b7.setAttribute("value", "");
                cb.input = b7.getAttribute("value") === "";
                b7.value = "t";
                b7.setAttribute("type", "radio");
                cb.radioValue = b7.value === "t";
                b7.setAttribute("checked", "t");
                b7.setAttribute("name", "t");
                b6 = aG.createDocumentFragment();
                b6.appendChild(b7);
                cb.appendChecked = b7.checked;
                cb.checkClone = b6.cloneNode(true).cloneNode(true).lastChild.checked;
                if (e.attachEvent) {
                    e.attachEvent("onclick", function () {
                        cb.noCloneEvent = false
                    });
                    e.cloneNode(true).click()
                }
                for (b3 in {
                    submit: true,
                    change: true,
                    focusin: true
                }) {
                    e.setAttribute(b4 = "on" + b3, "t");
                    cb[b3 + "Bubbles"] = b4 in bW || e.attributes[b4].expando === false
                }
                e.style.backgroundClip = "content-box";
                e.cloneNode(true).style.backgroundClip = "";
                cb.clearCloneStyle = e.style.backgroundClip === "content-box";
                al(function () {
                    var cc, cg, cf, cd = "padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",
                        ce = aG.getElementsByTagName("body")[0];
                    if (!ce) {
                        return
                    }
                    cc = aG.createElement("div");
                    cc.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px";
                    ce.appendChild(cc).appendChild(e);
                    e.innerHTML = "<table><tr><td></td><td>t</td></tr></table>";
                    cf = e.getElementsByTagName("td");
                    cf[0].style.cssText = "padding:0;margin:0;border:0;display:none";
                    b1 = (cf[0].offsetHeight === 0);
                    cf[0].style.display = "";
                    cf[1].style.display = "none";
                    cb.reliableHiddenOffsets = b1 && (cf[0].offsetHeight === 0);
                    e.innerHTML = "";
                    e.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;";
                    cb.boxSizing = (e.offsetWidth === 4);
                    cb.doesNotIncludeMarginInBodyOffset = (ce.offsetTop !== 1);
                    if (bW.getComputedStyle) {
                        cb.pixelPosition = (bW.getComputedStyle(e, null) || {}).top !== "1%";
                        cb.boxSizingReliable = (bW.getComputedStyle(e, null) || {
                            width: "4px"
                        }).width === "4px";
                        cg = e.appendChild(aG.createElement("div"));
                        cg.style.cssText = e.style.cssText = cd;
                        cg.style.marginRight = cg.style.width = "0";
                        e.style.width = "1px";
                        cb.reliableMarginRight = !parseFloat((bW.getComputedStyle(cg, null) || {}).marginRight)
                    }
                    if (typeof e.style.zoom !== "undefined") {
                        e.innerHTML = "";
                        e.style.cssText = cd + "width:1px;padding:1px;display:inline;zoom:1";
                        cb.inlineBlockNeedsLayout = (e.offsetWidth === 3);
                        e.style.display = "block";
                        e.innerHTML = "<div></div>";
                        e.firstChild.style.width = "5px";
                        cb.shrinkWrapBlocks = (e.offsetWidth !== 3);
                        ce.style.zoom = 1
                    }
                    ce.removeChild(cc);
                    cc = e = cf = cg = null
                });
                ca = b9 = b6 = b2 = b8 = b7 = null;
                return cb
            })();
            var bG = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
                l = /([A-Z])/g;

            function U(b2, e, b4, b3) {
                if (!al.acceptData(b2)) {
                    return
                }
                var b6, b8, b9 = al.expando,
                    b7 = typeof e === "string",
                    ca = b2.nodeType,
                    b5 = ca ? al.cache : b2,
                    b1 = ca ? b2[b9] : b2[b9] && b9;
                if ((!b1 || !b5[b1] || (!b3 && !b5[b1].data)) && b7 && b4 === c) {
                    return
                }
                if (!b1) {
                    if (ca) {
                        b2[b9] = b1 = b0.pop() || al.guid++
                    } else {
                        b1 = b9
                    }
                }
                if (!b5[b1]) {
                    b5[b1] = {};
                    if (!ca) {
                        b5[b1].toJSON = al.noop
                    }
                }
                if (typeof e === "object" || typeof e === "function") {
                    if (b3) {
                        b5[b1] = al.extend(b5[b1], e)
                    } else {
                        b5[b1].data = al.extend(b5[b1].data, e)
                    }
                }
                b6 = b5[b1];
                if (!b3) {
                    if (!b6.data) {
                        b6.data = {}
                    }
                    b6 = b6.data
                }
                if (b4 !== c) {
                    b6[al.camelCase(e)] = b4
                }
                if (b7) {
                    b8 = b6[e];
                    if (b8 == null) {
                        b8 = b6[al.camelCase(e)]
                    }
                } else {
                    b8 = b6
                }
                return b8
            }

            function bE(b2, e, b3) {
                if (!al.acceptData(b2)) {
                    return
                }
                var b7, b6, b5, b8 = b2.nodeType,
                    b4 = b8 ? al.cache : b2,
                    b1 = b8 ? b2[al.expando] : al.expando;
                if (!b4[b1]) {
                    return
                }
                if (e) {
                    b7 = b3 ? b4[b1] : b4[b1].data;
                    if (b7) {
                        if (!al.isArray(e)) {
                            if (e in b7) {
                                e = [e]
                            } else {
                                e = al.camelCase(e);
                                if (e in b7) {
                                    e = [e]
                                } else {
                                    e = e.split(" ")
                                }
                            }
                        } else {
                            e = e.concat(al.map(e, al.camelCase))
                        }
                        for (b6 = 0, b5 = e.length; b6 < b5; b6++) {
                            delete b7[e[b6]]
                        }
                        if (!(b3 ? bQ : al.isEmptyObject)(b7)) {
                            return
                        }
                    }
                }
                if (!b3) {
                    delete b4[b1].data;
                    if (!bQ(b4[b1])) {
                        return
                    }
                }
                if (b8) {
                    al.cleanData([b2], true)
                } else {
                    if (al.support.deleteExpando || b4 != b4.window) {
                        delete b4[b1]
                    } else {
                        b4[b1] = null
                    }
                }
            }
            al.extend({
                cache: {},
                expando: "jQuery" + (aV + Math.random()).replace(/\D/g, ""),
                noData: {
                    embed: true,
                    object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
                    applet: true
                },
                hasData: function (e) {
                    e = e.nodeType ? al.cache[e[al.expando]] : e[al.expando];
                    return !!e && !bQ(e)
                },
                data: function (e, b2, b1) {
                    return U(e, b2, b1, false)
                },
                removeData: function (b1, e) {
                    return bE(b1, e, false)
                },
                _data: function (e, b2, b1) {
                    return U(e, b2, b1, true)
                },
                _removeData: function (b1, e) {
                    return bE(b1, e, true)
                },
                acceptData: function (b1) {
                    var e = b1.nodeName && al.noData[b1.nodeName.toLowerCase()];
                    return !e || e !== true && b1.getAttribute("classid") === e
                }
            });
            al.fn.extend({
                data: function (e, b3) {
                    var b5, b4, b1 = this[0],
                        b6 = 0,
                        b2 = null;
                    if (e === c) {
                        if (this.length) {
                            b2 = al.data(b1);
                            if (b1.nodeType === 1 && !al._data(b1, "parsedAttrs")) {
                                b5 = b1.attributes;
                                for (; b6 < b5.length; b6++) {
                                    b4 = b5[b6].name;
                                    if (!b4.indexOf("data-")) {
                                        b4 = al.camelCase(b4.substring(5));
                                        ag(b1, b4, b2[b4])
                                    }
                                }
                                al._data(b1, "parsedAttrs", true)
                            }
                        }
                        return b2
                    }
                    if (typeof e === "object") {
                        return this.each(function () {
                            al.data(this, e)
                        })
                    }
                    return al.access(this, function (b7) {
                        if (b7 === c) {
                            return b1 ? ag(b1, e, al.data(b1, e)) : null
                        }
                        this.each(function () {
                            al.data(this, e, b7)
                        })
                    }, null, b3, arguments.length > 1, null, true)
                },
                removeData: function (e) {
                    return this.each(function () {
                        al.removeData(this, e)
                    })
                }
            });

            function ag(e, b4, b1) {
                if (b1 === c && e.nodeType === 1) {
                    var b3 = "data-" + b4.replace(l, "-$1").toLowerCase();
                    b1 = e.getAttribute(b3);
                    if (typeof b1 === "string") {
                        try {
                            b1 = b1 === "true" ? true : b1 === "false" ? false : b1 === "null" ? null : +b1 + "" === b1 ? +b1 : bG.test(b1) ? al.parseJSON(b1) : b1
                        } catch (b2) {}
                        al.data(e, b4, b1)
                    } else {
                        b1 = c
                    }
                }
                return b1
            }

            function bQ(b1) {
                var e;
                for (e in b1) {
                    if (e === "data" && al.isEmptyObject(b1[e])) {
                        continue
                    }
                    if (e !== "toJSON") {
                        return false
                    }
                }
                return true
            }
            al.extend({
                queue: function (e, b3, b1) {
                    var b2;
                    if (e) {
                        b3 = (b3 || "fx") + "queue";
                        b2 = al._data(e, b3);
                        if (b1) {
                            if (!b2 || al.isArray(b1)) {
                                b2 = al._data(e, b3, al.makeArray(b1))
                            } else {
                                b2.push(b1)
                            }
                        }
                        return b2 || []
                    }
                },
                dequeue: function (b2, b1) {
                    b1 = b1 || "fx";
                    var b5 = al.queue(b2, b1),
                        b3 = b5.length,
                        e = b5.shift(),
                        b4 = al._queueHooks(b2, b1),
                        b6 = function () {
                            al.dequeue(b2, b1)
                        };
                    if (e === "inprogress") {
                        e = b5.shift();
                        b3--
                    }
                    b4.cur = e;
                    if (e) {
                        if (b1 === "fx") {
                            b5.unshift("inprogress")
                        }
                        delete b4.stop;
                        e.call(b2, b6, b4)
                    }
                    if (!b3 && b4) {
                        b4.empty.fire()
                    }
                },
                _queueHooks: function (b1, e) {
                    var b2 = e + "queueHooks";
                    return al._data(b1, b2) || al._data(b1, b2, {
                        empty: al.Callbacks("once memory").add(function () {
                            al._removeData(b1, e + "queue");
                            al._removeData(b1, b2)
                        })
                    })
                }
            });
            al.fn.extend({
                queue: function (b2, e) {
                    var b1 = 2;
                    if (typeof b2 !== "string") {
                        e = b2;
                        b2 = "fx";
                        b1--
                    }
                    if (arguments.length < b1) {
                        return al.queue(this[0], b2)
                    }
                    return e === c ? this : this.each(function () {
                        var b3 = al.queue(this, b2, e);
                        al._queueHooks(this, b2);
                        if (b2 === "fx" && b3[0] !== "inprogress") {
                            al.dequeue(this, b2)
                        }
                    })
                },
                dequeue: function (e) {
                    return this.each(function () {
                        al.dequeue(this, e)
                    })
                },
                delay: function (b1, e) {
                    b1 = al.fx ? al.fx.speeds[b1] || b1 : b1;
                    e = e || "fx";
                    return this.queue(e, function (b3, b2) {
                        var b4 = setTimeout(b3, b1);
                        b2.stop = function () {
                            clearTimeout(b4)
                        }
                    })
                },
                clearQueue: function (e) {
                    return this.queue(e || "fx", [])
                },
                promise: function (b7, b3) {
                    var b6, e = 1,
                        b4 = al.Deferred(),
                        b2 = this,
                        b5 = this.length,
                        b1 = function () {
                            if (!(--e)) {
                                b4.resolveWith(b2, [b2])
                            }
                        };
                    if (typeof b7 !== "string") {
                        b3 = b7;
                        b7 = c
                    }
                    b7 = b7 || "fx";
                    while (b5--) {
                        b6 = al._data(b2[b5], b7 + "queueHooks");
                        if (b6 && b6.empty) {
                            e++;
                            b6.empty.add(b1)
                        }
                    }
                    b1();
                    return b4.promise(b3)
                }
            });
            var a6, I, az = /[\t\r\n]/g,
                aA = /\r/g,
                b = /^(?:input|select|textarea|button|object)$/i,
                R = /^(?:a|area)$/i,
                bM = /^(?:checked|selected|autofocus|autoplay|async|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped)$/i,
                aY = /^(?:checked|selected)$/i,
                aK = al.support.getSetAttribute,
                bj = al.support.input;
            al.fn.extend({
                attr: function (e, b1) {
                    return al.access(this, al.attr, e, b1, arguments.length > 1)
                },
                removeAttr: function (e) {
                    return this.each(function () {
                        al.removeAttr(this, e)
                    })
                },
                prop: function (e, b1) {
                    return al.access(this, al.prop, e, b1, arguments.length > 1)
                },
                removeProp: function (e) {
                    e = al.propFix[e] || e;
                    return this.each(function () {
                        try {
                            this[e] = c;
                            delete this[e]
                        } catch (b1) {}
                    })
                },
                addClass: function (b7) {
                    var e, b4, b8, b3, b1, b2 = 0,
                        b5 = this.length,
                        b6 = typeof b7 === "string" && b7;
                    if (al.isFunction(b7)) {
                        return this.each(function (b9) {
                            al(this).addClass(b7.call(this, b9, this.className))
                        })
                    }
                    if (b6) {
                        e = (b7 || "").match(bh) || [];
                        for (; b2 < b5; b2++) {
                            b4 = this[b2];
                            b8 = b4.nodeType === 1 && (b4.className ? (" " + b4.className + " ").replace(az, " ") : " ");
                            if (b8) {
                                b1 = 0;
                                while ((b3 = e[b1++])) {
                                    if (b8.indexOf(" " + b3 + " ") < 0) {
                                        b8 += b3 + " "
                                    }
                                }
                                b4.className = al.trim(b8)
                            }
                        }
                    }
                    return this
                },
                removeClass: function (b7) {
                    var e, b4, b8, b3, b1, b2 = 0,
                        b5 = this.length,
                        b6 = arguments.length === 0 || typeof b7 === "string" && b7;
                    if (al.isFunction(b7)) {
                        return this.each(function (b9) {
                            al(this).removeClass(b7.call(this, b9, this.className))
                        })
                    }
                    if (b6) {
                        e = (b7 || "").match(bh) || [];
                        for (; b2 < b5; b2++) {
                            b4 = this[b2];
                            b8 = b4.nodeType === 1 && (b4.className ? (" " + b4.className + " ").replace(az, " ") : "");
                            if (b8) {
                                b1 = 0;
                                while ((b3 = e[b1++])) {
                                    while (b8.indexOf(" " + b3 + " ") >= 0) {
                                        b8 = b8.replace(" " + b3 + " ", " ")
                                    }
                                }
                                b4.className = b7 ? al.trim(b8) : ""
                            }
                        }
                    }
                    return this
                },
                toggleClass: function (b1, b3) {
                    var e = typeof b1,
                        b2 = typeof b3 === "boolean";
                    if (al.isFunction(b1)) {
                        return this.each(function (b4) {
                            al(this).toggleClass(b1.call(this, b4, this.className, b3), b3)
                        })
                    }
                    return this.each(function () {
                        if (e === "string") {
                            var b5, b4 = 0,
                                b8 = al(this),
                                b6 = b3,
                                b7 = b1.match(bh) || [];
                            while ((b5 = b7[b4++])) {
                                b6 = b2 ? b6 : !b8.hasClass(b5);
                                b8[b6 ? "addClass" : "removeClass"](b5)
                            }
                        } else {
                            if (e === "undefined" || e === "boolean") {
                                if (this.className) {
                                    al._data(this, "__className__", this.className)
                                }
                                this.className = this.className || b1 === false ? "" : al._data(this, "__className__") || ""
                            }
                        }
                    })
                },
                hasClass: function (b2) {
                    var b1 = " " + b2 + " ",
                        e = 0,
                        b3 = this.length;
                    for (; e < b3; e++) {
                        if (this[e].nodeType === 1 && (" " + this[e].className + " ").replace(az, " ").indexOf(b1) >= 0) {
                            return true
                        }
                    }
                    return false
                },
                val: function (e) {
                    var b2, b3, b1, b4 = this[0];
                    if (!arguments.length) {
                        if (b4) {
                            b2 = al.valHooks[b4.type] || al.valHooks[b4.nodeName.toLowerCase()];
                            if (b2 && "get" in b2 && (b3 = b2.get(b4, "value")) !== c) {
                                return b3
                            }
                            b3 = b4.value;
                            return typeof b3 === "string" ? b3.replace(aA, "") : b3 == null ? "" : b3
                        }
                        return
                    }
                    b1 = al.isFunction(e);
                    return this.each(function (b6) {
                        var b7, b5 = al(this);
                        if (this.nodeType !== 1) {
                            return
                        }
                        if (b1) {
                            b7 = e.call(this, b6, b5.val())
                        } else {
                            b7 = e
                        } if (b7 == null) {
                            b7 = ""
                        } else {
                            if (typeof b7 === "number") {
                                b7 += ""
                            } else {
                                if (al.isArray(b7)) {
                                    b7 = al.map(b7, function (b8) {
                                        return b8 == null ? "" : b8 + ""
                                    })
                                }
                            }
                        }
                        b2 = al.valHooks[this.type] || al.valHooks[this.nodeName.toLowerCase()];
                        if (!b2 || !("set" in b2) || b2.set(this, b7, "value") === c) {
                            this.value = b7
                        }
                    })
                }
            });
            al.extend({
                valHooks: {
                    option: {
                        get: function (e) {
                            var b1 = e.attributes.value;
                            return !b1 || b1.specified ? e.value : e.text
                        }
                    },
                    select: {
                        get: function (b4) {
                            var b6, b1, b8 = b4.options,
                                b3 = b4.selectedIndex,
                                b2 = b4.type === "select-one" || b3 < 0,
                                b7 = b2 ? null : [],
                                b5 = b2 ? b3 + 1 : b8.length,
                                e = b3 < 0 ? b5 : b2 ? b3 : 0;
                            for (; e < b5; e++) {
                                b1 = b8[e];
                                if ((b1.selected || e === b3) && (al.support.optDisabled ? !b1.disabled : b1.getAttribute("disabled") === null) && (!b1.parentNode.disabled || !al.nodeName(b1.parentNode, "optgroup"))) {
                                    b6 = al(b1).val();
                                    if (b2) {
                                        return b6
                                    }
                                    b7.push(b6)
                                }
                            }
                            return b7
                        },
                        set: function (e, b1) {
                            var b2 = al.makeArray(b1);
                            al(e).find("option").each(function () {
                                this.selected = al.inArray(al(this).val(), b2) >= 0
                            });
                            if (!b2.length) {
                                e.selectedIndex = -1
                            }
                            return b2
                        }
                    }
                },
                attr: function (b2, e, b3) {
                    var b6, b4, b1, b5 = b2.nodeType;
                    if (!b2 || b5 === 3 || b5 === 8 || b5 === 2) {
                        return
                    }
                    if (typeof b2.getAttribute === "undefined") {
                        return al.prop(b2, e, b3)
                    }
                    b1 = b5 !== 1 || !al.isXMLDoc(b2);
                    if (b1) {
                        e = e.toLowerCase();
                        b4 = al.attrHooks[e] || (bM.test(e) ? I : a6)
                    }
                    if (b3 !== c) {
                        if (b3 === null) {
                            al.removeAttr(b2, e)
                        } else {
                            if (b4 && b1 && "set" in b4 && (b6 = b4.set(b2, b3, e)) !== c) {
                                return b6
                            } else {
                                b2.setAttribute(e, b3 + "");
                                return b3
                            }
                        }
                    } else {
                        if (b4 && b1 && "get" in b4 && (b6 = b4.get(b2, e)) !== null) {
                            return b6
                        } else {
                            if (typeof b2.getAttribute !== "undefined") {
                                b6 = b2.getAttribute(e)
                            }
                            return b6 == null ? c : b6
                        }
                    }
                },
                removeAttr: function (b5, b1) {
                    var b3, e, b4 = 0,
                        b2 = b1 && b1.match(bh);
                    if (b2 && b5.nodeType === 1) {
                        while ((b3 = b2[b4++])) {
                            e = al.propFix[b3] || b3;
                            if (bM.test(b3)) {
                                if (!aK && aY.test(b3)) {
                                    b5[al.camelCase("default-" + b3)] = b5[e] = false
                                } else {
                                    b5[e] = false
                                }
                            } else {
                                al.attr(b5, b3, "")
                            }
                            b5.removeAttribute(aK ? b3 : e)
                        }
                    }
                },
                attrHooks: {
                    type: {
                        set: function (b2, e) {
                            if (!al.support.radioValue && e === "radio" && al.nodeName(b2, "input")) {
                                var b1 = b2.value;
                                b2.setAttribute("type", e);
                                if (b1) {
                                    b2.value = b1
                                }
                                return e
                            }
                        }
                    }
                },
                propFix: {
                    tabindex: "tabIndex",
                    readonly: "readOnly",
                    "for": "htmlFor",
                    "class": "className",
                    maxlength: "maxLength",
                    cellspacing: "cellSpacing",
                    cellpadding: "cellPadding",
                    rowspan: "rowSpan",
                    colspan: "colSpan",
                    usemap: "useMap",
                    frameborder: "frameBorder",
                    contenteditable: "contentEditable"
                },
                prop: function (b2, e, b3) {
                    var b6, b4, b1, b5 = b2.nodeType;
                    if (!b2 || b5 === 3 || b5 === 8 || b5 === 2) {
                        return
                    }
                    b1 = b5 !== 1 || !al.isXMLDoc(b2);
                    if (b1) {
                        e = al.propFix[e] || e;
                        b4 = al.propHooks[e]
                    }
                    if (b3 !== c) {
                        if (b4 && "set" in b4 && (b6 = b4.set(b2, b3, e)) !== c) {
                            return b6
                        } else {
                            return (b2[e] = b3)
                        }
                    } else {
                        if (b4 && "get" in b4 && (b6 = b4.get(b2, e)) !== null) {
                            return b6
                        } else {
                            return b2[e]
                        }
                    }
                },
                propHooks: {
                    tabIndex: {
                        get: function (b1) {
                            var e = b1.getAttributeNode("tabindex");
                            return e && e.specified ? parseInt(e.value, 10) : b.test(b1.nodeName) || R.test(b1.nodeName) && b1.href ? 0 : c
                        }
                    }
                }
            });
            I = {
                get: function (e, b3) {
                    var b1 = al.prop(e, b3),
                        b2 = typeof b1 === "boolean" && e.getAttribute(b3),
                        b4 = typeof b1 === "boolean" ? bj && aK ? b2 != null : aY.test(b3) ? e[al.camelCase("default-" + b3)] : !! b2 : e.getAttributeNode(b3);
                    return b4 && b4.value !== false ? b3.toLowerCase() : c
                },
                set: function (e, b1, b2) {
                    if (b1 === false) {
                        al.removeAttr(e, b2)
                    } else {
                        if (bj && aK || !aY.test(b2)) {
                            e.setAttribute(!aK && al.propFix[b2] || b2, b2)
                        } else {
                            e[al.camelCase("default-" + b2)] = e[b2] = true
                        }
                    }
                    return b2
                }
            };
            if (!bj || !aK) {
                al.attrHooks.value = {
                    get: function (b1, e) {
                        var b2 = b1.getAttributeNode(e);
                        return al.nodeName(b1, "input") ? b1.defaultValue : b2 && b2.specified ? b2.value : c
                    },
                    set: function (e, b1, b2) {
                        if (al.nodeName(e, "input")) {
                            e.defaultValue = b1
                        } else {
                            return a6 && a6.set(e, b1, b2)
                        }
                    }
                }
            }
            if (!aK) {
                a6 = al.valHooks.button = {
                    get: function (b1, e) {
                        var b2 = b1.getAttributeNode(e);
                        return b2 && (e === "id" || e === "name" || e === "coords" ? b2.value !== "" : b2.specified) ? b2.value : c
                    },
                    set: function (e, b1, b3) {
                        var b2 = e.getAttributeNode(b3);
                        if (!b2) {
                            e.setAttributeNode((b2 = e.ownerDocument.createAttribute(b3)))
                        }
                        b2.value = b1 += "";
                        return b3 === "value" || b1 === e.getAttribute(b3) ? b1 : c
                    }
                };
                al.attrHooks.contenteditable = {
                    get: a6.get,
                    set: function (e, b1, b2) {
                        a6.set(e, b1 === "" ? false : b1, b2)
                    }
                };
                al.each(["width", "height"], function (b1, e) {
                    al.attrHooks[e] = al.extend(al.attrHooks[e], {
                        set: function (b2, b3) {
                            if (b3 === "") {
                                b2.setAttribute(e, "auto");
                                return b3
                            }
                        }
                    })
                })
            }
            if (!al.support.hrefNormalized) {
                al.each(["href", "src", "width", "height"], function (b1, e) {
                    al.attrHooks[e] = al.extend(al.attrHooks[e], {
                        get: function (b3) {
                            var b2 = b3.getAttribute(e, 2);
                            return b2 == null ? c : b2
                        }
                    })
                });
                al.each(["href", "src"], function (b1, e) {
                    al.propHooks[e] = {
                        get: function (b2) {
                            return b2.getAttribute(e, 4)
                        }
                    }
                })
            }
            if (!al.support.style) {
                al.attrHooks.style = {
                    get: function (e) {
                        return e.style.cssText || c
                    },
                    set: function (e, b1) {
                        return (e.style.cssText = b1 + "")
                    }
                }
            }
            if (!al.support.optSelected) {
                al.propHooks.selected = al.extend(al.propHooks.selected, {
                    get: function (b1) {
                        var e = b1.parentNode;
                        if (e) {
                            e.selectedIndex;
                            if (e.parentNode) {
                                e.parentNode.selectedIndex
                            }
                        }
                        return null
                    }
                })
            }
            if (!al.support.enctype) {
                al.propFix.enctype = "encoding"
            }
            if (!al.support.checkOn) {
                al.each(["radio", "checkbox"], function () {
                    al.valHooks[this] = {
                        get: function (e) {
                            return e.getAttribute("value") === null ? "on" : e.value
                        }
                    }
                })
            }
            al.each(["radio", "checkbox"], function () {
                al.valHooks[this] = al.extend(al.valHooks[this], {
                    set: function (e, b1) {
                        if (al.isArray(b1)) {
                            return (e.checked = al.inArray(al(e).val(), b1) >= 0)
                        }
                    }
                })
            });
            var bs = /^(?:input|select|textarea)$/i,
                bX = /^key/,
                aE = /^(?:mouse|contextmenu)|click/,
                z = /^(?:focusinfocus|focusoutblur)$/,
                bD = /^([^.]*)(?:\.(.+)|)$/;

            function bg() {
                return true
            }

            function bA() {
                return false
            }
            al.event = {
                global: {},
                add: function (b3, b9, cg, b6, b4) {
                    var b1, b8, b7, cf, ce, cd, cb, b2, cc, b5, e, ca = b3.nodeType !== 3 && b3.nodeType !== 8 && al._data(b3);
                    if (!ca) {
                        return
                    }
                    if (cg.handler) {
                        b1 = cg;
                        cg = b1.handler;
                        b4 = b1.selector
                    }
                    if (!cg.guid) {
                        cg.guid = al.guid++
                    }
                    if (!(cf = ca.events)) {
                        cf = ca.events = {}
                    }
                    if (!(b8 = ca.handle)) {
                        b8 = ca.handle = function (ch) {
                            return typeof al !== "undefined" && (!ch || al.event.triggered !== ch.type) ? al.event.dispatch.apply(b8.elem, arguments) : c
                        };
                        b8.elem = b3
                    }
                    b9 = (b9 || "").match(bh) || [""];
                    ce = b9.length;
                    while (ce--) {
                        b7 = bD.exec(b9[ce]) || [];
                        cc = e = b7[1];
                        b5 = (b7[2] || "").split(".").sort();
                        cb = al.event.special[cc] || {};
                        cc = (b4 ? cb.delegateType : cb.bindType) || cc;
                        cb = al.event.special[cc] || {};
                        cd = al.extend({
                            type: cc,
                            origType: e,
                            data: b6,
                            handler: cg,
                            guid: cg.guid,
                            selector: b4,
                            needsContext: b4 && al.expr.match.needsContext.test(b4),
                            namespace: b5.join(".")
                        }, b1);
                        if (!(b2 = cf[cc])) {
                            b2 = cf[cc] = [];
                            b2.delegateCount = 0;
                            if (!cb.setup || cb.setup.call(b3, b6, b5, b8) === false) {
                                if (b3.addEventListener) {
                                    b3.addEventListener(cc, b8, false)
                                } else {
                                    if (b3.attachEvent) {
                                        b3.attachEvent("on" + cc, b8)
                                    }
                                }
                            }
                        }
                        if (cb.add) {
                            cb.add.call(b3, cd);
                            if (!cd.handler.guid) {
                                cd.handler.guid = cg.guid
                            }
                        }
                        if (b4) {
                            b2.splice(b2.delegateCount++, 0, cd)
                        } else {
                            b2.push(cd)
                        }
                        al.event.global[cc] = true
                    }
                    b3 = null
                },
                remove: function (b2, b9, cg, b3, b8) {
                    var b6, b4, b7, cf, ce, cd, cb, b1, cc, b5, e, ca = al.hasData(b2) && al._data(b2);
                    if (!ca || !(cf = ca.events)) {
                        return
                    }
                    b9 = (b9 || "").match(bh) || [""];
                    ce = b9.length;
                    while (ce--) {
                        b7 = bD.exec(b9[ce]) || [];
                        cc = e = b7[1];
                        b5 = (b7[2] || "").split(".").sort();
                        if (!cc) {
                            for (cc in cf) {
                                al.event.remove(b2, cc + b9[ce], cg, b3, true)
                            }
                            continue
                        }
                        cb = al.event.special[cc] || {};
                        cc = (b3 ? cb.delegateType : cb.bindType) || cc;
                        b1 = cf[cc] || [];
                        b7 = b7[2] && new RegExp("(^|\\.)" + b5.join("\\.(?:.*\\.|)") + "(\\.|$)");
                        b4 = b6 = b1.length;
                        while (b6--) {
                            cd = b1[b6];
                            if ((b8 || e === cd.origType) && (!cg || cg.guid === cd.guid) && (!b7 || b7.test(cd.namespace)) && (!b3 || b3 === cd.selector || b3 === "**" && cd.selector)) {
                                b1.splice(b6, 1);
                                if (cd.selector) {
                                    b1.delegateCount--
                                }
                                if (cb.remove) {
                                    cb.remove.call(b2, cd)
                                }
                            }
                        }
                        if (b4 && !b1.length) {
                            if (!cb.teardown || cb.teardown.call(b2, b5, ca.handle) === false) {
                                al.removeEvent(b2, cc, ca.handle)
                            }
                            delete cf[cc]
                        }
                    }
                    if (al.isEmptyObject(cf)) {
                        delete ca.handle;
                        al._removeData(b2, "events")
                    }
                },
                trigger: function (e, b5, b3, ce) {
                    var b6, cc, b7, cd, b2, b8, ca, b4 = [b3 || aG],
                        cb = e.type || e,
                        b1 = e.namespace ? e.namespace.split(".") : [];
                    cc = b7 = b3 = b3 || aG;
                    if (b3.nodeType === 3 || b3.nodeType === 8) {
                        return
                    }
                    if (z.test(cb + al.event.triggered)) {
                        return
                    }
                    if (cb.indexOf(".") >= 0) {
                        b1 = cb.split(".");
                        cb = b1.shift();
                        b1.sort()
                    }
                    b2 = cb.indexOf(":") < 0 && "on" + cb;
                    e = e[al.expando] ? e : new al.Event(cb, typeof e === "object" && e);
                    e.isTrigger = true;
                    e.namespace = b1.join(".");
                    e.namespace_re = e.namespace ? new RegExp("(^|\\.)" + b1.join("\\.(?:.*\\.|)") + "(\\.|$)") : null;
                    e.result = c;
                    if (!e.target) {
                        e.target = b3
                    }
                    b5 = b5 == null ? [e] : al.makeArray(b5, [e]);
                    ca = al.event.special[cb] || {};
                    if (!ce && ca.trigger && ca.trigger.apply(b3, b5) === false) {
                        return
                    }
                    if (!ce && !ca.noBubble && !al.isWindow(b3)) {
                        cd = ca.delegateType || cb;
                        if (!z.test(cd + cb)) {
                            cc = cc.parentNode
                        }
                        for (; cc; cc = cc.parentNode) {
                            b4.push(cc);
                            b7 = cc
                        }
                        if (b7 === (b3.ownerDocument || aG)) {
                            b4.push(b7.defaultView || b7.parentWindow || bW)
                        }
                    }
                    b6 = 0;
                    while ((cc = b4[b6++]) && !e.isPropagationStopped()) {
                        e.type = b6 > 1 ? cd : ca.bindType || cb;
                        b8 = (al._data(cc, "events") || {})[e.type] && al._data(cc, "handle");
                        if (b8) {
                            b8.apply(cc, b5)
                        }
                        b8 = b2 && cc[b2];
                        if (b8 && al.acceptData(cc) && b8.apply && b8.apply(cc, b5) === false) {
                            e.preventDefault()
                        }
                    }
                    e.type = cb;
                    if (!ce && !e.isDefaultPrevented()) {
                        if ((!ca._default || ca._default.apply(b3.ownerDocument, b5) === false) && !(cb === "click" && al.nodeName(b3, "a")) && al.acceptData(b3)) {
                            if (b2 && b3[cb] && !al.isWindow(b3)) {
                                b7 = b3[b2];
                                if (b7) {
                                    b3[b2] = null
                                }
                                al.event.triggered = cb;
                                try {
                                    b3[cb]()
                                } catch (b9) {}
                                al.event.triggered = c;
                                if (b7) {
                                    b3[b2] = b7
                                }
                            }
                        }
                    }
                    return e.result
                },
                dispatch: function (b4) {
                    b4 = al.event.fix(b4);
                    var b3, b2, b5, e, b9, b8 = [],
                        b7 = bY.call(arguments),
                        b1 = (al._data(this, "events") || {})[b4.type] || [],
                        b6 = al.event.special[b4.type] || {};
                    b7[0] = b4;
                    b4.delegateTarget = this;
                    if (b6.preDispatch && b6.preDispatch.call(this, b4) === false) {
                        return
                    }
                    b8 = al.event.handlers.call(this, b4, b1);
                    b3 = 0;
                    while ((e = b8[b3++]) && !b4.isPropagationStopped()) {
                        b4.currentTarget = e.elem;
                        b2 = 0;
                        while ((b9 = e.handlers[b2++]) && !b4.isImmediatePropagationStopped()) {
                            if (!b4.namespace_re || b4.namespace_re.test(b9.namespace)) {
                                b4.handleObj = b9;
                                b4.data = b9.data;
                                b5 = ((al.event.special[b9.origType] || {}).handle || b9.handler).apply(e.elem, b7);
                                if (b5 !== c) {
                                    if ((b4.result = b5) === false) {
                                        b4.preventDefault();
                                        b4.stopPropagation()
                                    }
                                }
                            }
                        }
                    }
                    if (b6.postDispatch) {
                        b6.postDispatch.call(this, b4)
                    }
                    return b4.result
                },
                handlers: function (b4, b1) {
                    var b3, b5, e, b7, b6 = [],
                        b2 = b1.delegateCount,
                        b8 = b4.target;
                    if (b2 && b8.nodeType && (!b4.button || b4.type !== "click")) {
                        for (; b8 != this; b8 = b8.parentNode || this) {
                            if (b8.disabled !== true || b4.type !== "click") {
                                b5 = [];
                                for (b3 = 0; b3 < b2; b3++) {
                                    b7 = b1[b3];
                                    e = b7.selector + " ";
                                    if (b5[e] === c) {
                                        b5[e] = b7.needsContext ? al(e, this).index(b8) >= 0 : al.find(e, this, null, [b8]).length
                                    }
                                    if (b5[e]) {
                                        b5.push(b7)
                                    }
                                }
                                if (b5.length) {
                                    b6.push({
                                        elem: b8,
                                        handlers: b5
                                    })
                                }
                            }
                        }
                    }
                    if (b2 < b1.length) {
                        b6.push({
                            elem: this,
                            handlers: b1.slice(b2)
                        })
                    }
                    return b6
                },
                fix: function (b5) {
                    if (b5[al.expando]) {
                        return b5
                    }
                    var b4, b2, b3 = b5,
                        e = al.event.fixHooks[b5.type] || {}, b1 = e.props ? this.props.concat(e.props) : this.props;
                    b5 = new al.Event(b3);
                    b4 = b1.length;
                    while (b4--) {
                        b2 = b1[b4];
                        b5[b2] = b3[b2]
                    }
                    if (!b5.target) {
                        b5.target = b3.srcElement || aG
                    }
                    if (b5.target.nodeType === 3) {
                        b5.target = b5.target.parentNode
                    }
                    b5.metaKey = !! b5.metaKey;
                    return e.filter ? e.filter(b5, b3) : b5
                },
                props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
                fixHooks: {},
                keyHooks: {
                    props: "char charCode key keyCode".split(" "),
                    filter: function (b1, e) {
                        if (b1.which == null) {
                            b1.which = e.charCode != null ? e.charCode : e.keyCode
                        }
                        return b1
                    }
                },
                mouseHooks: {
                    props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                    filter: function (e, b6) {
                        var b1, b2, b4, b5 = b6.button,
                            b3 = b6.fromElement;
                        if (e.pageX == null && b6.clientX != null) {
                            b1 = e.target.ownerDocument || aG;
                            b2 = b1.documentElement;
                            b4 = b1.body;
                            e.pageX = b6.clientX + (b2 && b2.scrollLeft || b4 && b4.scrollLeft || 0) - (b2 && b2.clientLeft || b4 && b4.clientLeft || 0);
                            e.pageY = b6.clientY + (b2 && b2.scrollTop || b4 && b4.scrollTop || 0) - (b2 && b2.clientTop || b4 && b4.clientTop || 0)
                        }
                        if (!e.relatedTarget && b3) {
                            e.relatedTarget = b3 === e.target ? b6.toElement : b3
                        }
                        if (!e.which && b5 !== c) {
                            e.which = (b5 & 1 ? 1 : (b5 & 2 ? 3 : (b5 & 4 ? 2 : 0)))
                        }
                        return e
                    }
                },
                special: {
                    load: {
                        noBubble: true
                    },
                    click: {
                        trigger: function () {
                            if (al.nodeName(this, "input") && this.type === "checkbox" && this.click) {
                                this.click();
                                return false
                            }
                        }
                    },
                    focus: {
                        trigger: function () {
                            if (this !== aG.activeElement && this.focus) {
                                try {
                                    this.focus();
                                    return false
                                } catch (e) {}
                            }
                        },
                        delegateType: "focusin"
                    },
                    blur: {
                        trigger: function () {
                            if (this === aG.activeElement && this.blur) {
                                this.blur();
                                return false
                            }
                        },
                        delegateType: "focusout"
                    },
                    beforeunload: {
                        postDispatch: function (e) {
                            if (e.result !== c) {
                                e.originalEvent.returnValue = e.result
                            }
                        }
                    }
                },
                simulate: function (b4, b1, e, b3) {
                    var b2 = al.extend(new al.Event(), e, {
                        type: b4,
                        isSimulated: true,
                        originalEvent: {}
                    });
                    if (b3) {
                        al.event.trigger(b2, null, b1)
                    } else {
                        al.event.dispatch.call(b1, b2)
                    } if (b2.isDefaultPrevented()) {
                        e.preventDefault()
                    }
                }
            };
            al.removeEvent = aG.removeEventListener ? function (e, b2, b1) {
                if (e.removeEventListener) {
                    e.removeEventListener(b2, b1, false)
                }
            } : function (e, b3, b1) {
                var b2 = "on" + b3;
                if (e.detachEvent) {
                    if (typeof e[b2] === "undefined") {
                        e[b2] = null
                    }
                    e.detachEvent(b2, b1)
                }
            };
            al.Event = function (b1, e) {
                if (!(this instanceof al.Event)) {
                    return new al.Event(b1, e)
                }
                if (b1 && b1.type) {
                    this.originalEvent = b1;
                    this.type = b1.type;
                    this.isDefaultPrevented = (b1.defaultPrevented || b1.returnValue === false || b1.getPreventDefault && b1.getPreventDefault()) ? bg : bA
                } else {
                    this.type = b1
                } if (e) {
                    al.extend(this, e)
                }
                this.timeStamp = b1 && b1.timeStamp || al.now();
                this[al.expando] = true
            };
            al.Event.prototype = {
                isDefaultPrevented: bA,
                isPropagationStopped: bA,
                isImmediatePropagationStopped: bA,
                preventDefault: function () {
                    var e = this.originalEvent;
                    this.isDefaultPrevented = bg;
                    if (!e) {
                        return
                    }
                    if (e.preventDefault) {
                        e.preventDefault()
                    } else {
                        e.returnValue = false
                    }
                },
                stopPropagation: function () {
                    var e = this.originalEvent;
                    this.isPropagationStopped = bg;
                    if (!e) {
                        return
                    }
                    if (e.stopPropagation) {
                        e.stopPropagation()
                    }
                    e.cancelBubble = true
                },
                stopImmediatePropagation: function () {
                    this.isImmediatePropagationStopped = bg;
                    this.stopPropagation()
                }
            };
            al.each({
                mouseenter: "mouseover",
                mouseleave: "mouseout"
            }, function (b1, e) {
                al.event.special[b1] = {
                    delegateType: e,
                    bindType: e,
                    handle: function (b6) {
                        var b4, b3 = this,
                            b2 = b6.relatedTarget,
                            b5 = b6.handleObj;
                        if (!b2 || (b2 !== b3 && !al.contains(b3, b2))) {
                            b6.type = b5.origType;
                            b4 = b5.handler.apply(this, arguments);
                            b6.type = e
                        }
                        return b4
                    }
                }
            });
            if (!al.support.submitBubbles) {
                al.event.special.submit = {
                    setup: function () {
                        if (al.nodeName(this, "form")) {
                            return false
                        }
                        al.event.add(this, "click._submit keypress._submit", function (b1) {
                            var e = b1.target,
                                b2 = al.nodeName(e, "input") || al.nodeName(e, "button") ? e.form : c;
                            if (b2 && !al._data(b2, "submitBubbles")) {
                                al.event.add(b2, "submit._submit", function (b3) {
                                    b3._submit_bubble = true
                                });
                                al._data(b2, "submitBubbles", true)
                            }
                        })
                    },
                    postDispatch: function (e) {
                        if (e._submit_bubble) {
                            delete e._submit_bubble;
                            if (this.parentNode && !e.isTrigger) {
                                al.event.simulate("submit", this.parentNode, e, true)
                            }
                        }
                    },
                    teardown: function () {
                        if (al.nodeName(this, "form")) {
                            return false
                        }
                        al.event.remove(this, "._submit")
                    }
                }
            }
            if (!al.support.changeBubbles) {
                al.event.special.change = {
                    setup: function () {
                        if (bs.test(this.nodeName)) {
                            if (this.type === "checkbox" || this.type === "radio") {
                                al.event.add(this, "propertychange._change", function (e) {
                                    if (e.originalEvent.propertyName === "checked") {
                                        this._just_changed = true
                                    }
                                });
                                al.event.add(this, "click._change", function (e) {
                                    if (this._just_changed && !e.isTrigger) {
                                        this._just_changed = false
                                    }
                                    al.event.simulate("change", this, e, true)
                                })
                            }
                            return false
                        }
                        al.event.add(this, "beforeactivate._change", function (b1) {
                            var e = b1.target;
                            if (bs.test(e.nodeName) && !al._data(e, "changeBubbles")) {
                                al.event.add(e, "change._change", function (b2) {
                                    if (this.parentNode && !b2.isSimulated && !b2.isTrigger) {
                                        al.event.simulate("change", this.parentNode, b2, true)
                                    }
                                });
                                al._data(e, "changeBubbles", true)
                            }
                        })
                    },
                    handle: function (b1) {
                        var e = b1.target;
                        if (this !== e || b1.isSimulated || b1.isTrigger || (e.type !== "radio" && e.type !== "checkbox")) {
                            return b1.handleObj.handler.apply(this, arguments)
                        }
                    },
                    teardown: function () {
                        al.event.remove(this, "._change");
                        return !bs.test(this.nodeName)
                    }
                }
            }
            if (!al.support.focusinBubbles) {
                al.each({
                    focus: "focusin",
                    blur: "focusout"
                }, function (b1, b2) {
                    var b3 = 0,
                        e = function (b4) {
                            al.event.simulate(b2, b4.target, al.event.fix(b4), true)
                        };
                    al.event.special[b2] = {
                        setup: function () {
                            if (b3++ === 0) {
                                aG.addEventListener(b1, e, true)
                            }
                        },
                        teardown: function () {
                            if (--b3 === 0) {
                                aG.removeEventListener(b1, e, true)
                            }
                        }
                    }
                })
            }
            al.fn.extend({
                on: function (b6, b4, b2, b1, b5) {
                    var b3, e;
                    if (typeof b6 === "object") {
                        if (typeof b4 !== "string") {
                            b2 = b2 || b4;
                            b4 = c
                        }
                        for (e in b6) {
                            this.on(e, b4, b2, b6[e], b5)
                        }
                        return this
                    }
                    if (b2 == null && b1 == null) {
                        b1 = b4;
                        b2 = b4 = c
                    } else {
                        if (b1 == null) {
                            if (typeof b4 === "string") {
                                b1 = b2;
                                b2 = c
                            } else {
                                b1 = b2;
                                b2 = b4;
                                b4 = c
                            }
                        }
                    } if (b1 === false) {
                        b1 = bA
                    } else {
                        if (!b1) {
                            return this
                        }
                    } if (b5 === 1) {
                        b3 = b1;
                        b1 = function (b7) {
                            al().off(b7);
                            return b3.apply(this, arguments)
                        };
                        b1.guid = b3.guid || (b3.guid = al.guid++)
                    }
                    return this.each(function () {
                        al.event.add(this, b6, b1, b2, b4)
                    })
                },
                one: function (b3, b2, b1, e) {
                    return this.on(b3, b2, b1, e, 1)
                },
                off: function (b4, b2, b1) {
                    var b3, e;
                    if (b4 && b4.preventDefault && b4.handleObj) {
                        b3 = b4.handleObj;
                        al(b4.delegateTarget).off(b3.namespace ? b3.origType + "." + b3.namespace : b3.origType, b3.selector, b3.handler);
                        return this
                    }
                    if (typeof b4 === "object") {
                        for (e in b4) {
                            this.off(e, b2, b4[e])
                        }
                        return this
                    }
                    if (b2 === false || typeof b2 === "function") {
                        b1 = b2;
                        b2 = c
                    }
                    if (b1 === false) {
                        b1 = bA
                    }
                    return this.each(function () {
                        al.event.remove(this, b4, b1, b2)
                    })
                },
                bind: function (b2, b1, e) {
                    return this.on(b2, null, b1, e)
                },
                unbind: function (e, b1) {
                    return this.off(e, null, b1)
                },
                delegate: function (b2, b3, b1, e) {
                    return this.on(b3, b2, b1, e)
                },
                undelegate: function (b2, e, b1) {
                    return arguments.length === 1 ? this.off(b2, "**") : this.off(e, b2 || "**", b1)
                },
                trigger: function (e, b1) {
                    return this.each(function () {
                        al.event.trigger(e, b1, this)
                    })
                },
                triggerHandler: function (b2, b1) {
                    var e = this[0];
                    if (e) {
                        return al.event.trigger(b2, b1, e, true)
                    }
                },
                hover: function (e, b1) {
                    return this.mouseenter(e).mouseleave(b1 || e)
                }
            });
            al.each(("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu").split(" "), function (b1, e) {
                al.fn[e] = function (b3, b2) {
                    return arguments.length > 0 ? this.on(e, null, b3, b2) : this.trigger(e)
                };
                if (bX.test(e)) {
                    al.event.fixHooks[e] = al.event.keyHooks
                }
                if (aE.test(e)) {
                    al.event.fixHooks[e] = al.event.mouseHooks
                }
            });
            (function (c6, cV) {
                var cf, cX, b5, dd, cq, cz, cA, co, cC, cj, b6, cO, cG, c7, cW, db, c9, c1 = "sizzle" + -(new Date()),
                    cp = c6.document,
                    cl = {}, cm = 0,
                    cI = 0,
                    cL = ch(),
                    c0 = ch(),
                    dc = ch(),
                    c5 = typeof cV,
                    cu = 1 << 31,
                    c3 = [],
                    c4 = c3.pop,
                    cJ = c3.push,
                    b4 = c3.slice,
                    cT = c3.indexOf || function (df) {
                        var de = 0,
                            dg = this.length;
                        for (; de < dg; de++) {
                            if (this[de] === df) {
                                return de
                            }
                        }
                        return -1
                    }, b7 = "[\\x20\\t\\r\\n\\f]",
                    cH = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                    cr = cH.replace("w", "w#"),
                    e = "([*^$|!~]?=)",
                    cY = "\\[" + b7 + "*(" + cH + ")" + b7 + "*(?:" + e + b7 + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + cr + ")|)|)" + b7 + "*\\]",
                    b2 = ":(" + cH + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + cY.replace(3, 8) + ")*)|.*)\\)|)",
                    b9 = new RegExp("^" + b7 + "+|((?:^|[^\\\\])(?:\\\\.)*)" + b7 + "+$", "g"),
                    cc = new RegExp("^" + b7 + "*," + b7 + "*"),
                    ci = new RegExp("^" + b7 + "*([\\x20\\t\\r\\n\\f>+~])" + b7 + "*"),
                    cw = new RegExp(b2),
                    cx = new RegExp("^" + cr + "$"),
                    cF = {
                        ID: new RegExp("^#(" + cH + ")"),
                        CLASS: new RegExp("^\\.(" + cH + ")"),
                        NAME: new RegExp("^\\[name=['\"]?(" + cH + ")['\"]?\\]"),
                        TAG: new RegExp("^(" + cH.replace("w", "w*") + ")"),
                        ATTR: new RegExp("^" + cY),
                        PSEUDO: new RegExp("^" + b2),
                        CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + b7 + "*(even|odd|(([+-]|)(\\d*)n|)" + b7 + "*(?:([+-]|)" + b7 + "*(\\d+)|))" + b7 + "*\\)|)", "i"),
                        needsContext: new RegExp("^" + b7 + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + b7 + "*((?:-\\d)?\\d*)" + b7 + "*\\)|)(?=[^-]|$)", "i")
                    }, cD = /[\x20\t\r\n\f]*[+~]/,
                    ct = /\{\s*\[native code\]\s*\}/,
                    cv = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                    cR = /^(?:input|select|textarea|button)$/i,
                    b3 = /^h\d$/i,
                    cs = /'|\\/g,
                    cb = /\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,
                    ca = /\\([\da-fA-F]{1,6}[\x20\t\r\n\f]?|.)/g,
                    cK = function (df, dg) {
                        var de = "0x" + dg - 65536;
                        return de !== de ? dg : de < 0 ? String.fromCharCode(de + 65536) : String.fromCharCode(de >> 10 | 55296, de & 1023 | 56320)
                    };
                try {
                    b4.call(b6.childNodes, 0)[0].nodeType
                } catch (c8) {
                    b4 = function (de) {
                        var df, dg = [];
                        for (;
                            (df = this[de]); de++) {
                            dg.push(df)
                        }
                        return dg
                    }
                }

                function da(de) {
                    return ct.test(de + "")
                }

                function ch() {
                    var df, de = [];
                    return (df = function (dg, dh) {
                        if (de.push(dg += " ") > b5.cacheLength) {
                            delete df[de.shift()]
                        }
                        return (df[dg] = dh)
                    })
                }

                function b1(de) {
                    de[c1] = true;
                    return de
                }

                function cM(de) {
                    var dg = cj.createElement("div");
                    try {
                        return de(dg)
                    } catch (df) {
                        return false
                    } finally {
                        dg = null
                    }
                }

                function cd(dh, dp, dl, dn) {
                    var dm, dt, df, dj, dk, ds, dr, de, dq, di;
                    if ((dp ? dp.ownerDocument || dp : cp) !== cj) {
                        cC(dp)
                    }
                    dp = dp || cj;
                    dl = dl || [];
                    if (!dh || typeof dh !== "string") {
                        return dl
                    }
                    if ((dj = dp.nodeType) !== 1 && dj !== 9) {
                        return []
                    }
                    if (!cO && !dn) {
                        if ((dm = cv.exec(dh))) {
                            if ((df = dm[1])) {
                                if (dj === 9) {
                                    dt = dp.getElementById(df);
                                    if (dt && dt.parentNode) {
                                        if (dt.id === df) {
                                            dl.push(dt);
                                            return dl
                                        }
                                    } else {
                                        return dl
                                    }
                                } else {
                                    if (dp.ownerDocument && (dt = dp.ownerDocument.getElementById(df)) && db(dp, dt) && dt.id === df) {
                                        dl.push(dt);
                                        return dl
                                    }
                                }
                            } else {
                                if (dm[2]) {
                                    cJ.apply(dl, b4.call(dp.getElementsByTagName(dh), 0));
                                    return dl
                                } else {
                                    if ((df = dm[3]) && cl.getByClassName && dp.getElementsByClassName) {
                                        cJ.apply(dl, b4.call(dp.getElementsByClassName(df), 0));
                                        return dl
                                    }
                                }
                            }
                        }
                        if (cl.qsa && !cG.test(dh)) {
                            dr = true;
                            de = c1;
                            dq = dp;
                            di = dj === 9 && dh;
                            if (dj === 1 && dp.nodeName.toLowerCase() !== "object") {
                                ds = cS(dh);
                                if ((dr = dp.getAttribute("id"))) {
                                    de = dr.replace(cs, "\\$&")
                                } else {
                                    dp.setAttribute("id", de)
                                }
                                de = "[id='" + de + "'] ";
                                dk = ds.length;
                                while (dk--) {
                                    ds[dk] = de + cU(ds[dk])
                                }
                                dq = cD.test(dh) && dp.parentNode || dp;
                                di = ds.join(",")
                            }
                            if (di) {
                                try {
                                    cJ.apply(dl, b4.call(dq.querySelectorAll(di), 0));
                                    return dl
                                } catch (dg) {} finally {
                                    if (!dr) {
                                        dp.removeAttribute("id")
                                    }
                                }
                            }
                        }
                    }
                    return ck(dh.replace(b9, "$1"), dp, dl, dn)
                }
                cq = cd.isXML = function (df) {
                    var de = df && (df.ownerDocument || df).documentElement;
                    return de ? de.nodeName !== "HTML" : false
                };
                cC = cd.setDocument = function (df) {
                    var de = df ? df.ownerDocument || df : cp;
                    if (de === cj || de.nodeType !== 9 || !de.documentElement) {
                        return cj
                    }
                    cj = de;
                    b6 = de.documentElement;
                    cO = cq(de);
                    cl.tagNameNoComments = cM(function (dg) {
                        dg.appendChild(de.createComment(""));
                        return !dg.getElementsByTagName("*").length
                    });
                    cl.attributes = cM(function (dh) {
                        dh.innerHTML = "<select></select>";
                        var dg = typeof dh.lastChild.getAttribute("multiple");
                        return dg !== "boolean" && dg !== "string"
                    });
                    cl.getByClassName = cM(function (dg) {
                        dg.innerHTML = "<div class='hidden e'></div><div class='hidden'></div>";
                        if (!dg.getElementsByClassName || !dg.getElementsByClassName("e").length) {
                            return false
                        }
                        dg.lastChild.className = "e";
                        return dg.getElementsByClassName("e").length === 2
                    });
                    cl.getByName = cM(function (dh) {
                        dh.id = c1 + 0;
                        dh.innerHTML = "<a name='" + c1 + "'></a><div name='" + c1 + "'></div>";
                        b6.insertBefore(dh, b6.firstChild);
                        var dg = de.getElementsByName && de.getElementsByName(c1).length === 2 + de.getElementsByName(c1 + 0).length;
                        cl.getIdNotName = !de.getElementById(c1);
                        b6.removeChild(dh);
                        return dg
                    });
                    b5.attrHandle = cM(function (dg) {
                        dg.innerHTML = "<a href='#'></a>";
                        return dg.firstChild && typeof dg.firstChild.getAttribute !== c5 && dg.firstChild.getAttribute("href") === "#"
                    }) ? {} : {
                        href: function (dg) {
                            return dg.getAttribute("href", 2)
                        },
                        type: function (dg) {
                            return dg.getAttribute("type")
                        }
                    };
                    if (cl.getIdNotName) {
                        b5.find.ID = function (di, dh) {
                            if (typeof dh.getElementById !== c5 && !cO) {
                                var dg = dh.getElementById(di);
                                return dg && dg.parentNode ? [dg] : []
                            }
                        };
                        b5.filter.ID = function (dh) {
                            var dg = dh.replace(ca, cK);
                            return function (di) {
                                return di.getAttribute("id") === dg
                            }
                        }
                    } else {
                        b5.find.ID = function (di, dh) {
                            if (typeof dh.getElementById !== c5 && !cO) {
                                var dg = dh.getElementById(di);
                                return dg ? dg.id === di || typeof dg.getAttributeNode !== c5 && dg.getAttributeNode("id").value === di ? [dg] : cV : []
                            }
                        };
                        b5.filter.ID = function (dh) {
                            var dg = dh.replace(ca, cK);
                            return function (dj) {
                                var di = typeof dj.getAttributeNode !== c5 && dj.getAttributeNode("id");
                                return di && di.value === dg
                            }
                        }
                    }
                    b5.find.TAG = cl.tagNameNoComments ? function (dg, dh) {
                        if (typeof dh.getElementsByTagName !== c5) {
                            return dh.getElementsByTagName(dg)
                        }
                    } : function (dg, dk) {
                        var dl, dj = [],
                            di = 0,
                            dh = dk.getElementsByTagName(dg);
                        if (dg === "*") {
                            for (;
                                (dl = dh[di]); di++) {
                                if (dl.nodeType === 1) {
                                    dj.push(dl)
                                }
                            }
                            return dj
                        }
                        return dh
                    };
                    b5.find.NAME = cl.getByName && function (dg, dh) {
                        if (typeof dh.getElementsByName !== c5) {
                            return dh.getElementsByName(name)
                        }
                    };
                    b5.find.CLASS = cl.getByClassName && function (dh, dg) {
                        if (typeof dg.getElementsByClassName !== c5 && !cO) {
                            return dg.getElementsByClassName(dh)
                        }
                    };
                    c7 = [];
                    cG = [":focus"];
                    if ((cl.qsa = da(de.querySelectorAll))) {
                        cM(function (dg) {
                            dg.innerHTML = "<select><option selected=''></option></select>";
                            if (!dg.querySelectorAll("[selected]").length) {
                                cG.push("\\[" + b7 + "*(?:checked|disabled|ismap|multiple|readonly|selected|value)")
                            }
                            if (!dg.querySelectorAll(":checked").length) {
                                cG.push(":checked")
                            }
                        });
                        cM(function (dg) {
                            dg.innerHTML = "<input type='hidden' i=''/>";
                            if (dg.querySelectorAll("[i^='']").length) {
                                cG.push("[*^$]=" + b7 + "*(?:\"\"|'')")
                            }
                            if (!dg.querySelectorAll(":enabled").length) {
                                cG.push(":enabled", ":disabled")
                            }
                            dg.querySelectorAll("*,:x");
                            cG.push(",.*:")
                        })
                    }
                    if ((cl.matchesSelector = da((cW = b6.matchesSelector || b6.mozMatchesSelector || b6.webkitMatchesSelector || b6.oMatchesSelector || b6.msMatchesSelector)))) {
                        cM(function (dg) {
                            cl.disconnectedMatch = cW.call(dg, "div");
                            cW.call(dg, "[s!='']:x");
                            c7.push("!=", b2)
                        })
                    }
                    cG = new RegExp(cG.join("|"));
                    c7 = new RegExp(c7.join("|"));
                    db = da(b6.contains) || b6.compareDocumentPosition ? function (dh, dg) {
                        var dj = dh.nodeType === 9 ? dh.documentElement : dh,
                            di = dg && dg.parentNode;
                        return dh === di || !! (di && di.nodeType === 1 && (dj.contains ? dj.contains(di) : dh.compareDocumentPosition && dh.compareDocumentPosition(di) & 16))
                    } : function (dh, dg) {
                        if (dg) {
                            while ((dg = dg.parentNode)) {
                                if (dg === dh) {
                                    return true
                                }
                            }
                        }
                        return false
                    };
                    c9 = b6.compareDocumentPosition ? function (dh, dg) {
                        var di;
                        if (dh === dg) {
                            cA = true;
                            return 0
                        }
                        if ((di = dg.compareDocumentPosition && dh.compareDocumentPosition && dh.compareDocumentPosition(dg))) {
                            if (di & 1 || dh.parentNode && dh.parentNode.nodeType === 11) {
                                if (dh === de || db(cp, dh)) {
                                    return -1
                                }
                                if (dg === de || db(cp, dg)) {
                                    return 1
                                }
                                return 0
                            }
                            return di & 4 ? -1 : 1
                        }
                        return dh.compareDocumentPosition ? -1 : 1
                    } : function (dn, dm) {
                        var dl, di = 0,
                            dk = dn.parentNode,
                            dh = dm.parentNode,
                            dg = [dn],
                            dj = [dm];
                        if (dn === dm) {
                            cA = true;
                            return 0
                        } else {
                            if (dn.sourceIndex && dm.sourceIndex) {
                                return (~dm.sourceIndex || cu) - (db(cp, dn) && ~dn.sourceIndex || cu)
                            } else {
                                if (!dk || !dh) {
                                    return dn === de ? -1 : dm === de ? 1 : dk ? -1 : dh ? 1 : 0
                                } else {
                                    if (dk === dh) {
                                        return cN(dn, dm)
                                    }
                                }
                            }
                        }
                        dl = dn;
                        while ((dl = dl.parentNode)) {
                            dg.unshift(dl)
                        }
                        dl = dm;
                        while ((dl = dl.parentNode)) {
                            dj.unshift(dl)
                        }
                        while (dg[di] === dj[di]) {
                            di++
                        }
                        return di ? cN(dg[di], dj[di]) : dg[di] === cp ? -1 : dj[di] === cp ? 1 : 0
                    };
                    cA = false;
                    [0, 0].sort(c9);
                    cl.detectDuplicates = cA;
                    return cj
                };
                cd.matches = function (de, df) {
                    return cd(de, null, null, df)
                };
                cd.matchesSelector = function (df, dh) {
                    if ((df.ownerDocument || df) !== cj) {
                        cC(df)
                    }
                    dh = dh.replace(cb, "='$1']");
                    if (cl.matchesSelector && !cO && (!c7 || !c7.test(dh)) && !cG.test(dh)) {
                        try {
                            var de = cW.call(df, dh);
                            if (de || cl.disconnectedMatch || df.document && df.document.nodeType !== 11) {
                                return de
                            }
                        } catch (dg) {}
                    }
                    return cd(dh, cj, null, [df]).length > 0
                };
                cd.contains = function (df, de) {
                    if ((df.ownerDocument || df) !== cj) {
                        cC(df)
                    }
                    return db(df, de)
                };
                cd.attr = function (de, df) {
                    var dg;
                    if ((de.ownerDocument || de) !== cj) {
                        cC(de)
                    }
                    if (!cO) {
                        df = df.toLowerCase()
                    }
                    if ((dg = b5.attrHandle[df])) {
                        return dg(de)
                    }
                    if (cO || cl.attributes) {
                        return de.getAttribute(df)
                    }
                    return ((dg = de.getAttributeNode(df)) || de.getAttribute(df)) && de[df] === true ? df : dg && dg.specified ? dg.value : null
                };
                cd.error = function (de) {
                    throw new Error("Syntax error, unrecognized expression: " + de)
                };
                cd.uniqueSort = function (df) {
                    var dh, di = [],
                        de = 1,
                        dg = 0;
                    cA = !cl.detectDuplicates;
                    df.sort(c9);
                    if (cA) {
                        for (;
                            (dh = df[de]); de++) {
                            if (dh === df[de - 1]) {
                                dg = di.push(de)
                            }
                        }
                        while (dg--) {
                            df.splice(di[dg], 1)
                        }
                    }
                    return df
                };

                function cN(de, df) {
                    var dg = de && df && de.nextSibling;
                    for (; dg; dg = dg.nextSibling) {
                        if (dg === df) {
                            return -1
                        }
                    }
                    return de ? 1 : -1
                }

                function ce(de) {
                    return function (dg) {
                        var df = dg.nodeName.toLowerCase();
                        return df === "input" && dg.type === de
                    }
                }

                function cP(de) {
                    return function (dg) {
                        var df = dg.nodeName.toLowerCase();
                        return (df === "input" || df === "button") && dg.type === de
                    }
                }

                function cZ(de) {
                    return b1(function (df) {
                        df = +df;
                        return b1(function (dg, dk) {
                            var di, dh = de([], dg.length, df),
                                dj = dh.length;
                            while (dj--) {
                                if (dg[(di = dh[dj])]) {
                                    dg[di] = !(dk[di] = dg[di])
                                }
                            }
                        })
                    })
                }
                dd = cd.getText = function (di) {
                    var dh, de = "",
                        df = 0,
                        dg = di.nodeType;
                    if (!dg) {
                        for (;
                            (dh = di[df]); df++) {
                            de += dd(dh)
                        }
                    } else {
                        if (dg === 1 || dg === 9 || dg === 11) {
                            if (typeof di.textContent === "string") {
                                return di.textContent
                            } else {
                                for (di = di.firstChild; di; di = di.nextSibling) {
                                    de += dd(di)
                                }
                            }
                        } else {
                            if (dg === 3 || dg === 4) {
                                return di.nodeValue
                            }
                        }
                    }
                    return de
                };
                b5 = cd.selectors = {
                    cacheLength: 50,
                    createPseudo: b1,
                    match: cF,
                    find: {},
                    relative: {
                        ">": {
                            dir: "parentNode",
                            first: true
                        },
                        " ": {
                            dir: "parentNode"
                        },
                        "+": {
                            dir: "previousSibling",
                            first: true
                        },
                        "~": {
                            dir: "previousSibling"
                        }
                    },
                    preFilter: {
                        ATTR: function (de) {
                            de[1] = de[1].replace(ca, cK);
                            de[3] = (de[4] || de[5] || "").replace(ca, cK);
                            if (de[2] === "~=") {
                                de[3] = " " + de[3] + " "
                            }
                            return de.slice(0, 4)
                        },
                        CHILD: function (de) {
                            de[1] = de[1].toLowerCase();
                            if (de[1].slice(0, 3) === "nth") {
                                if (!de[3]) {
                                    cd.error(de[0])
                                }
                                de[4] = +(de[4] ? de[5] + (de[6] || 1) : 2 * (de[3] === "even" || de[3] === "odd"));
                                de[5] = +((de[7] + de[8]) || de[3] === "odd")
                            } else {
                                if (de[3]) {
                                    cd.error(de[0])
                                }
                            }
                            return de
                        },
                        PSEUDO: function (de) {
                            var df, dg = !de[5] && de[2];
                            if (cF.CHILD.test(de[0])) {
                                return null
                            }
                            if (de[4]) {
                                de[2] = de[4]
                            } else {
                                if (dg && cw.test(dg) && (df = cS(dg, true)) && (df = dg.indexOf(")", dg.length - df) - dg.length)) {
                                    de[0] = de[0].slice(0, df);
                                    de[2] = dg.slice(0, df)
                                }
                            }
                            return de.slice(0, 3)
                        }
                    },
                    filter: {
                        TAG: function (de) {
                            if (de === "*") {
                                return function () {
                                    return true
                                }
                            }
                            de = de.replace(ca, cK).toLowerCase();
                            return function (df) {
                                return df.nodeName && df.nodeName.toLowerCase() === de
                            }
                        },
                        CLASS: function (df) {
                            var de = cL[df + " "];
                            return de || (de = new RegExp("(^|" + b7 + ")" + df + "(" + b7 + "|$)")) && cL(df, function (dg) {
                                return de.test(dg.className || (typeof dg.getAttribute !== c5 && dg.getAttribute("class")) || "")
                            })
                        },
                        ATTR: function (df, de, dg) {
                            return function (di) {
                                var dh = cd.attr(di, df);
                                if (dh == null) {
                                    return de === "!="
                                }
                                if (!de) {
                                    return true
                                }
                                dh += "";
                                return de === "=" ? dh === dg : de === "!=" ? dh !== dg : de === "^=" ? dg && dh.indexOf(dg) === 0 : de === "*=" ? dg && dh.indexOf(dg) > -1 : de === "$=" ? dg && dh.substr(dh.length - dg.length) === dg : de === "~=" ? (" " + dh + " ").indexOf(dg) > -1 : de === "|=" ? dh === dg || dh.substr(0, dg.length + 1) === dg + "-" : false
                            }
                        },
                        CHILD: function (de, di, dh, dj, df) {
                            var dl = de.slice(0, 3) !== "nth",
                                dg = de.slice(-4) !== "last",
                                dk = di === "of-type";
                            return dj === 1 && df === 0 ? function (dm) {
                                return !!dm.parentNode
                            } : function (dy, dw, dn) {
                                var ds, dr, dz, dq, dm, dv, dx = dl !== dg ? "nextSibling" : "previousSibling",
                                    dp = dy.parentNode,
                                    du = dk && dy.nodeName.toLowerCase(),
                                    dt = !dn && !dk;
                                if (dp) {
                                    if (dl) {
                                        while (dx) {
                                            dz = dy;
                                            while ((dz = dz[dx])) {
                                                if (dk ? dz.nodeName.toLowerCase() === du : dz.nodeType === 1) {
                                                    return false
                                                }
                                            }
                                            dv = dx = de === "only" && !dv && "nextSibling"
                                        }
                                        return true
                                    }
                                    dv = [dg ? dp.firstChild : dp.lastChild];
                                    if (dg && dt) {
                                        dr = dp[c1] || (dp[c1] = {});
                                        ds = dr[de] || [];
                                        dm = ds[0] === cm && ds[1];
                                        dq = ds[0] === cm && ds[2];
                                        dz = dm && dp.childNodes[dm];
                                        while ((dz = ++dm && dz && dz[dx] || (dq = dm = 0) || dv.pop())) {
                                            if (dz.nodeType === 1 && ++dq && dz === dy) {
                                                dr[de] = [cm, dm, dq];
                                                break
                                            }
                                        }
                                    } else {
                                        if (dt && (ds = (dy[c1] || (dy[c1] = {}))[de]) && ds[0] === cm) {
                                            dq = ds[1]
                                        } else {
                                            while ((dz = ++dm && dz && dz[dx] || (dq = dm = 0) || dv.pop())) {
                                                if ((dk ? dz.nodeName.toLowerCase() === du : dz.nodeType === 1) && ++dq) {
                                                    if (dt) {
                                                        (dz[c1] || (dz[c1] = {}))[de] = [cm, dq]
                                                    }
                                                    if (dz === dy) {
                                                        break
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    dq -= df;
                                    return dq === dj || (dq % dj === 0 && dq / dj >= 0)
                                }
                            }
                        },
                        PSEUDO: function (dh, df) {
                            var dg, de = b5.pseudos[dh] || b5.setFilters[dh.toLowerCase()] || cd.error("unsupported pseudo: " + dh);
                            if (de[c1]) {
                                return de(df)
                            }
                            if (de.length > 1) {
                                dg = [dh, dh, "", df];
                                return b5.setFilters.hasOwnProperty(dh.toLowerCase()) ? b1(function (dj, dl) {
                                    var di, dm = de(dj, df),
                                        dk = dm.length;
                                    while (dk--) {
                                        di = cT.call(dj, dm[dk]);
                                        dj[di] = !(dl[di] = dm[dk])
                                    }
                                }) : function (di) {
                                    return de(di, 0, dg)
                                }
                            }
                            return de
                        }
                    },
                    pseudos: {
                        not: b1(function (df) {
                            var de = [],
                                dg = [],
                                dh = cz(df.replace(b9, "$1"));
                            return dh[c1] ? b1(function (dp, dm, dk, di) {
                                var dl, dn = dh(dp, null, di, []),
                                    dj = dp.length;
                                while (dj--) {
                                    if ((dl = dn[dj])) {
                                        dp[dj] = !(dm[dj] = dl)
                                    }
                                }
                            }) : function (dk, dj, di) {
                                de[0] = dk;
                                dh(de, null, di, dg);
                                return !dg.pop()
                            }
                        }),
                        has: b1(function (de) {
                            return function (df) {
                                return cd(de, df).length > 0
                            }
                        }),
                        contains: b1(function (de) {
                            return function (df) {
                                return (df.textContent || df.innerText || dd(df)).indexOf(de) > -1
                            }
                        }),
                        lang: b1(function (de) {
                            if (!cx.test(de || "")) {
                                cd.error("unsupported lang: " + de)
                            }
                            de = de.replace(ca, cK).toLowerCase();
                            return function (dg) {
                                var df;
                                do {
                                    if ((df = cO ? dg.getAttribute("xml:lang") || dg.getAttribute("lang") : dg.lang)) {
                                        df = df.toLowerCase();
                                        return df === de || df.indexOf(de + "-") === 0
                                    }
                                } while ((dg = dg.parentNode) && dg.nodeType === 1);
                                return false
                            }
                        }),
                        target: function (df) {
                            var de = c6.location && c6.location.hash;
                            return de && de.slice(1) === df.id
                        },
                        root: function (de) {
                            return de === b6
                        },
                        focus: function (de) {
                            return de === cj.activeElement && (!cj.hasFocus || cj.hasFocus()) && !! (de.type || de.href || ~de.tabIndex)
                        },
                        enabled: function (de) {
                            return de.disabled === false
                        },
                        disabled: function (de) {
                            return de.disabled === true
                        },
                        checked: function (df) {
                            var de = df.nodeName.toLowerCase();
                            return (de === "input" && !! df.checked) || (de === "option" && !! df.selected)
                        },
                        selected: function (de) {
                            if (de.parentNode) {
                                de.parentNode.selectedIndex
                            }
                            return de.selected === true
                        },
                        empty: function (de) {
                            for (de = de.firstChild; de; de = de.nextSibling) {
                                if (de.nodeName > "@" || de.nodeType === 3 || de.nodeType === 4) {
                                    return false
                                }
                            }
                            return true
                        },
                        parent: function (de) {
                            return !b5.pseudos.empty(de)
                        },
                        header: function (de) {
                            return b3.test(de.nodeName)
                        },
                        input: function (de) {
                            return cR.test(de.nodeName)
                        },
                        button: function (de) {
                            var df = de.nodeName.toLowerCase();
                            return df === "input" && de.type === "button" || df === "button"
                        },
                        text: function (de) {
                            var df;
                            return de.nodeName.toLowerCase() === "input" && de.type === "text" && ((df = de.getAttribute("type")) == null || df.toLowerCase() === de.type)
                        },
                        first: cZ(function () {
                            return [0]
                        }),
                        last: cZ(function (df, de) {
                            return [de - 1]
                        }),
                        eq: cZ(function (df, dg, de) {
                            return [de < 0 ? de + dg : de]
                        }),
                        even: cZ(function (df, dg) {
                            var de = 0;
                            for (; de < dg; de += 2) {
                                df.push(de)
                            }
                            return df
                        }),
                        odd: cZ(function (df, dg) {
                            var de = 1;
                            for (; de < dg; de += 2) {
                                df.push(de)
                            }
                            return df
                        }),
                        lt: cZ(function (df, dh, dg) {
                            var de = dg < 0 ? dg + dh : dg;
                            for (; --de >= 0;) {
                                df.push(de)
                            }
                            return df
                        }),
                        gt: cZ(function (df, dh, dg) {
                            var de = dg < 0 ? dg + dh : dg;
                            for (; ++de < dh;) {
                                df.push(de)
                            }
                            return df
                        })
                    }
                };
                for (cf in {
                    radio: true,
                    checkbox: true,
                    file: true,
                    password: true,
                    image: true
                }) {
                    b5.pseudos[cf] = ce(cf)
                }
                for (cf in {
                    submit: true,
                    reset: true
                }) {
                    b5.pseudos[cf] = cP(cf)
                }

                function cS(dh, dn) {
                    var de, di, dl, dm, dk, df, dj, dg = c0[dh + " "];
                    if (dg) {
                        return dn ? 0 : dg.slice(0)
                    }
                    dk = dh;
                    df = [];
                    dj = b5.preFilter;
                    while (dk) {
                        if (!de || (di = cc.exec(dk))) {
                            if (di) {
                                dk = dk.slice(di[0].length) || dk
                            }
                            df.push(dl = [])
                        }
                        de = false;
                        if ((di = ci.exec(dk))) {
                            de = di.shift();
                            dl.push({
                                value: de,
                                type: di[0].replace(b9, " ")
                            });
                            dk = dk.slice(de.length)
                        }
                        for (dm in b5.filter) {
                            if ((di = cF[dm].exec(dk)) && (!dj[dm] || (di = dj[dm](di)))) {
                                de = di.shift();
                                dl.push({
                                    value: de,
                                    type: dm,
                                    matches: di
                                });
                                dk = dk.slice(de.length)
                            }
                        }
                        if (!de) {
                            break
                        }
                    }
                    return dn ? dk.length : dk ? cd.error(dh) : c0(dh, df).slice(0)
                }

                function cU(dh) {
                    var df = 0,
                        de = dh.length,
                        dg = "";
                    for (; df < de; df++) {
                        dg += dh[df].value
                    }
                    return dg
                }

                function b8(di, df, dh) {
                    var dg = df.dir,
                        dj = dh && df.dir === "parentNode",
                        de = cI++;
                    return df.first ? function (dl, dk, dm) {
                        while ((dl = dl[dg])) {
                            if (dl.nodeType === 1 || dj) {
                                return di(dl, dk, dm)
                            }
                        }
                    } : function (dm, dk, dr) {
                        var dp, dq, dl, dn = cm + " " + de;
                        if (dr) {
                            while ((dm = dm[dg])) {
                                if (dm.nodeType === 1 || dj) {
                                    if (di(dm, dk, dr)) {
                                        return true
                                    }
                                }
                            }
                        } else {
                            while ((dm = dm[dg])) {
                                if (dm.nodeType === 1 || dj) {
                                    dl = dm[c1] || (dm[c1] = {});
                                    if ((dq = dl[dg]) && dq[0] === dn) {
                                        if ((dp = dq[1]) === true || dp === cX) {
                                            return dp === true
                                        }
                                    } else {
                                        dq = dl[dg] = [dn];
                                        dq[1] = di(dm, dk, dr) || cX;
                                        if (dq[1] === true) {
                                            return true
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                function cn(de) {
                    return de.length > 1 ? function (di, dh, df) {
                        var dg = de.length;
                        while (dg--) {
                            if (!de[dg](di, dh, df)) {
                                return false
                            }
                        }
                        return true
                    } : de[0]
                }

                function cE(dj, de, df, dg, dk) {
                    var dh, dn = [],
                        di = 0,
                        dl = dj.length,
                        dm = de != null;
                    for (; di < dl; di++) {
                        if ((dh = dj[di])) {
                            if (!df || df(dh, dg, dk)) {
                                dn.push(dh);
                                if (dm) {
                                    de.push(di)
                                }
                            }
                        }
                    }
                    return dn
                }

                function cQ(df, de, di, dh, dj, dg) {
                    if (dh && !dh[c1]) {
                        dh = cQ(dh)
                    }
                    if (dj && !dj[c1]) {
                        dj = cQ(dj, dg)
                    }
                    return b1(function (dm, dx, ds, dl) {
                        var dp, dk, du, dt = [],
                            dn = [],
                            dr = dx.length,
                            dq = dm || cg(de || "*", ds.nodeType ? [ds] : ds, []),
                            dv = df && (dm || !de) ? cE(dq, dt, df, ds, dl) : dq,
                            dw = di ? dj || (dm ? df : dr || dh) ? [] : dx : dv;
                        if (di) {
                            di(dv, dw, ds, dl)
                        }
                        if (dh) {
                            dp = cE(dw, dn);
                            dh(dp, [], ds, dl);
                            dk = dp.length;
                            while (dk--) {
                                if ((du = dp[dk])) {
                                    dw[dn[dk]] = !(dv[dn[dk]] = du)
                                }
                            }
                        }
                        if (dm) {
                            if (dj || df) {
                                if (dj) {
                                    dp = [];
                                    dk = dw.length;
                                    while (dk--) {
                                        if ((du = dw[dk])) {
                                            dp.push((dv[dk] = du))
                                        }
                                    }
                                    dj(null, (dw = []), dp, dl)
                                }
                                dk = dw.length;
                                while (dk--) {
                                    if ((du = dw[dk]) && (dp = dj ? cT.call(dm, du) : dt[dk]) > -1) {
                                        dm[dp] = !(dx[dp] = du)
                                    }
                                }
                            }
                        } else {
                            dw = cE(dw === dx ? dw.splice(dr, dw.length) : dw);
                            if (dj) {
                                dj(null, dx, dw, dl)
                            } else {
                                cJ.apply(dx, dw)
                            }
                        }
                    })
                }

                function c2(dj) {
                    var dp, dg, de, dh = dj.length,
                        dm = b5.relative[dj[0].type],
                        dn = dm || b5.relative[" "],
                        df = dm ? 1 : 0,
                        dk = b8(function (dq) {
                            return dq === dp
                        }, dn, true),
                        dl = b8(function (dq) {
                            return cT.call(dp, dq) > -1
                        }, dn, true),
                        di = [
                            function (ds, dr, dq) {
                                return (!dm && (dq || dr !== co)) || ((dp = dr).nodeType ? dk(ds, dr, dq) : dl(ds, dr, dq))
                            }
                        ];
                    for (; df < dh; df++) {
                        if ((dg = b5.relative[dj[df].type])) {
                            di = [b8(cn(di), dg)]
                        } else {
                            dg = b5.filter[dj[df].type].apply(null, dj[df].matches);
                            if (dg[c1]) {
                                de = ++df;
                                for (; de < dh; de++) {
                                    if (b5.relative[dj[de].type]) {
                                        break
                                    }
                                }
                                return cQ(df > 1 && cn(di), df > 1 && cU(dj.slice(0, df - 1)).replace(b9, "$1"), dg, df < de && c2(dj.slice(df, de)), de < dh && c2((dj = dj.slice(de))), de < dh && cU(dj))
                            }
                            di.push(dg)
                        }
                    }
                    return cn(di)
                }

                function cB(dh, df) {
                    var dj = 0,
                        dg = df.length > 0,
                        di = dh.length > 0,
                        de = function (dl, dv, dk, dA, dw) {
                            var dx, dy, dm, dr = [],
                                dq = 0,
                                dz = "0",
                                ds = dl && [],
                                dn = dw != null,
                                dp = co,
                                du = dl || di && b5.find.TAG("*", dw && dv.parentNode || dv),
                                dt = (cm += dp == null ? 1 : Math.E);
                            if (dn) {
                                co = dv !== cj && dv;
                                cX = dj
                            }
                            for (;
                                (dx = du[dz]) != null; dz++) {
                                if (di && dx) {
                                    for (dy = 0;
                                        (dm = dh[dy]); dy++) {
                                        if (dm(dx, dv, dk)) {
                                            dA.push(dx);
                                            break
                                        }
                                    }
                                    if (dn) {
                                        cm = dt;
                                        cX = ++dj
                                    }
                                }
                                if (dg) {
                                    if ((dx = !dm && dx)) {
                                        dq--
                                    }
                                    if (dl) {
                                        ds.push(dx)
                                    }
                                }
                            }
                            dq += dz;
                            if (dg && dz !== dq) {
                                for (dy = 0;
                                    (dm = df[dy]); dy++) {
                                    dm(ds, dr, dv, dk)
                                }
                                if (dl) {
                                    if (dq > 0) {
                                        while (dz--) {
                                            if (!(ds[dz] || dr[dz])) {
                                                dr[dz] = c4.call(dA)
                                            }
                                        }
                                    }
                                    dr = cE(dr)
                                }
                                cJ.apply(dA, dr);
                                if (dn && !dl && dr.length > 0 && (dq + df.length) > 1) {
                                    cd.uniqueSort(dA)
                                }
                            }
                            if (dn) {
                                cm = dt;
                                co = dp
                            }
                            return ds
                        };
                    return dg ? b1(de) : de
                }
                cz = cd.compile = function (df, dj) {
                    var dg, de = [],
                        di = [],
                        dh = dc[df + " "];
                    if (!dh) {
                        if (!dj) {
                            dj = cS(df)
                        }
                        dg = dj.length;
                        while (dg--) {
                            dh = c2(dj[dg]);
                            if (dh[c1]) {
                                de.push(dh)
                            } else {
                                di.push(dh)
                            }
                        }
                        dh = dc(df, cB(di, de))
                    }
                    return dh
                };

                function cg(de, di, dh) {
                    var df = 0,
                        dg = di.length;
                    for (; df < dg; df++) {
                        cd(de, di[df], dh)
                    }
                    return dh
                }

                function ck(df, di, dg, dk) {
                    var dh, dm, de, dn, dl, dj = cS(df);
                    if (!dk) {
                        if (dj.length === 1) {
                            dm = dj[0] = dj[0].slice(0);
                            if (dm.length > 2 && (de = dm[0]).type === "ID" && di.nodeType === 9 && !cO && b5.relative[dm[1].type]) {
                                di = b5.find.ID(de.matches[0].replace(ca, cK), di)[0];
                                if (!di) {
                                    return dg
                                }
                                df = df.slice(dm.shift().value.length)
                            }
                            for (dh = cF.needsContext.test(df) ? -1 : dm.length - 1; dh >= 0; dh--) {
                                de = dm[dh];
                                if (b5.relative[(dn = de.type)]) {
                                    break
                                }
                                if ((dl = b5.find[dn])) {
                                    if ((dk = dl(de.matches[0].replace(ca, cK), cD.test(dm[0].type) && di.parentNode || di))) {
                                        dm.splice(dh, 1);
                                        df = dk.length && cU(dm);
                                        if (!df) {
                                            cJ.apply(dg, b4.call(dk, 0));
                                            return dg
                                        }
                                        break
                                    }
                                }
                            }
                        }
                    }
                    cz(df, dj)(dk, di, cO, dg, cD.test(df));
                    return dg
                }
                b5.pseudos.nth = b5.pseudos.eq;

                function cy() {}
                b5.filters = cy.prototype = b5.pseudos;
                b5.setFilters = new cy();
                cC();
                cd.attr = al.attr;
                al.find = cd;
                al.expr = cd.selectors;
                al.expr[":"] = al.expr.pseudos;
                al.unique = cd.uniqueSort;
                al.text = cd.getText;
                al.isXMLDoc = cd.isXML;
                al.contains = cd.contains
            })(bW);
            var aw = /Until$/,
                bB = /^(?:parents|prev(?:Until|All))/,
                aM = /^.[^:#\[\.,]*$/,
                bS = al.expr.match.needsContext,
                bH = {
                    children: true,
                    contents: true,
                    next: true,
                    prev: true
                };
            al.fn.extend({
                find: function (b2) {
                    var b1, e, b3;
                    if (typeof b2 !== "string") {
                        b3 = this;
                        return this.pushStack(al(b2).filter(function () {
                            for (b1 = 0; b1 < b3.length; b1++) {
                                if (al.contains(b3[b1], this)) {
                                    return true
                                }
                            }
                        }))
                    }
                    e = [];
                    for (b1 = 0; b1 < this.length; b1++) {
                        al.find(b2, this[b1], e)
                    }
                    e = this.pushStack(al.unique(e));
                    e.selector = (this.selector ? this.selector + " " : "") + b2;
                    return e
                },
                has: function (b1) {
                    var e, b3 = al(b1, this),
                        b2 = b3.length;
                    return this.filter(function () {
                        for (e = 0; e < b2; e++) {
                            if (al.contains(this, b3[e])) {
                                return true
                            }
                        }
                    })
                },
                not: function (e) {
                    return this.pushStack(m(this, e, false))
                },
                filter: function (e) {
                    return this.pushStack(m(this, e, true))
                },
                is: function (e) {
                    return !!e && (typeof e === "string" ? bS.test(e) ? al(e, this.context).index(this[0]) >= 0 : al.filter(e, this).length > 0 : this.filter(e).length > 0)
                },
                closest: function (b1, e) {
                    var b2, b6 = 0,
                        b4 = this.length,
                        b5 = [],
                        b3 = bS.test(b1) || typeof b1 !== "string" ? al(b1, e || this.context) : 0;
                    for (; b6 < b4; b6++) {
                        b2 = this[b6];
                        while (b2 && b2.ownerDocument && b2 !== e && b2.nodeType !== 11) {
                            if (b3 ? b3.index(b2) > -1 : al.find.matchesSelector(b2, b1)) {
                                b5.push(b2);
                                break
                            }
                            b2 = b2.parentNode
                        }
                    }
                    return this.pushStack(b5.length > 1 ? al.unique(b5) : b5)
                },
                index: function (e) {
                    if (!e) {
                        return (this[0] && this[0].parentNode) ? this.first().prevAll().length : -1
                    }
                    if (typeof e === "string") {
                        return al.inArray(this[0], al(e))
                    }
                    return al.inArray(e.jquery ? e[0] : e, this)
                },
                add: function (b2, b3) {
                    var b1 = typeof b2 === "string" ? al(b2, b3) : al.makeArray(b2 && b2.nodeType ? [b2] : b2),
                        e = al.merge(this.get(), b1);
                    return this.pushStack(al.unique(e))
                },
                addBack: function (e) {
                    return this.add(e == null ? this.prevObject : this.prevObject.filter(e))
                }
            });
            al.fn.andSelf = al.fn.addBack;

            function w(b1, e) {
                do {
                    b1 = b1[e]
                } while (b1 && b1.nodeType !== 1);
                return b1
            }
            al.each({
                parent: function (b1) {
                    var e = b1.parentNode;
                    return e && e.nodeType !== 11 ? e : null
                },
                parents: function (e) {
                    return al.dir(e, "parentNode")
                },
                parentsUntil: function (e, b2, b1) {
                    return al.dir(e, "parentNode", b1)
                },
                next: function (e) {
                    return w(e, "nextSibling")
                },
                prev: function (e) {
                    return w(e, "previousSibling")
                },
                nextAll: function (e) {
                    return al.dir(e, "nextSibling")
                },
                prevAll: function (e) {
                    return al.dir(e, "previousSibling")
                },
                nextUntil: function (e, b2, b1) {
                    return al.dir(e, "nextSibling", b1)
                },
                prevUntil: function (e, b2, b1) {
                    return al.dir(e, "previousSibling", b1)
                },
                siblings: function (e) {
                    return al.sibling((e.parentNode || {}).firstChild, e)
                },
                children: function (e) {
                    return al.sibling(e.firstChild)
                },
                contents: function (e) {
                    return al.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : al.merge([], e.childNodes)
                }
            }, function (e, b1) {
                al.fn[e] = function (b4, b2) {
                    var b3 = al.map(this, b1, b4);
                    if (!aw.test(e)) {
                        b2 = b4
                    }
                    if (b2 && typeof b2 === "string") {
                        b3 = al.filter(b2, b3)
                    }
                    b3 = this.length > 1 && !bH[e] ? al.unique(b3) : b3;
                    if (this.length > 1 && bB.test(e)) {
                        b3 = b3.reverse()
                    }
                    return this.pushStack(b3)
                }
            });
            al.extend({
                filter: function (b1, b2, e) {
                    if (e) {
                        b1 = ":not(" + b1 + ")"
                    }
                    return b2.length === 1 ? al.find.matchesSelector(b2[0], b1) ? [b2[0]] : [] : al.find.matches(b1, b2)
                },
                dir: function (b4, b3, b1) {
                    var b2 = [],
                        e = b4[b3];
                    while (e && e.nodeType !== 9 && (b1 === c || e.nodeType !== 1 || !al(e).is(b1))) {
                        if (e.nodeType === 1) {
                            b2.push(e)
                        }
                        e = e[b3]
                    }
                    return b2
                },
                sibling: function (b1, e) {
                    var b2 = [];
                    for (; b1; b1 = b1.nextSibling) {
                        if (b1.nodeType === 1 && b1 !== e) {
                            b2.push(b1)
                        }
                    }
                    return b2
                }
            });

            function m(b1, e, b2) {
                e = e || 0;
                if (al.isFunction(e)) {
                    return al.grep(b1, function (b4, b6) {
                        var b5 = !! e.call(b4, b6, b4);
                        return b5 === b2
                    })
                } else {
                    if (e.nodeType) {
                        return al.grep(b1, function (b4) {
                            return (b4 === e) === b2
                        })
                    } else {
                        if (typeof e === "string") {
                            var b3 = al.grep(b1, function (b4) {
                                return b4.nodeType === 1
                            });
                            if (aM.test(e)) {
                                return al.filter(e, b3, !b2)
                            } else {
                                e = al.filter(e, b3)
                            }
                        }
                    }
                }
                return al.grep(b1, function (b4) {
                    return (al.inArray(b4, e) >= 0) === b2
                })
            }

            function O(b2) {
                var b1 = at.split("|"),
                    e = b2.createDocumentFragment();
                if (e.createElement) {
                    while (b1.length) {
                        e.createElement(b1.pop())
                    }
                }
                return e
            }
            var at = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
                Z = / jQuery\d+="(?:null|\d+)"/g,
                ae = new RegExp("<(?:" + at + ")[\\s/>]", "i"),
                n = /^\s+/,
                ad = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
                aJ = /<([\w:]+)/,
                E = /<tbody/i,
                ac = /<|&#?\w+;/,
                aC = /<(?:script|style|link)/i,
                aR = /^(?:checkbox|radio)$/i,
                a4 = /checked\s*(?:[^=]|=\s*.checked.)/i,
                ah = /^$|\/(?:java|ecma)script/i,
                a3 = /^true\/(.*)/,
                i = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
                bq = {
                    option: [1, "<select multiple='multiple'>", "</select>"],
                    legend: [1, "<fieldset>", "</fieldset>"],
                    area: [1, "<map>", "</map>"],
                    param: [1, "<object>", "</object>"],
                    thead: [1, "<table>", "</table>"],
                    tr: [2, "<table><tbody>", "</tbody></table>"],
                    col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
                    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                    _default: al.support.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
                }, r = O(aG),
                aD = r.appendChild(aG.createElement("div"));
            bq.optgroup = bq.option;
            bq.tbody = bq.tfoot = bq.colgroup = bq.caption = bq.thead;
            bq.th = bq.td;
            al.fn.extend({
                text: function (e) {
                    return al.access(this, function (b1) {
                        return b1 === c ? al.text(this) : this.empty().append((this[0] && this[0].ownerDocument || aG).createTextNode(b1))
                    }, null, e, arguments.length)
                },
                wrapAll: function (e) {
                    if (al.isFunction(e)) {
                        return this.each(function (b2) {
                            al(this).wrapAll(e.call(this, b2))
                        })
                    }
                    if (this[0]) {
                        var b1 = al(e, this[0].ownerDocument).eq(0).clone(true);
                        if (this[0].parentNode) {
                            b1.insertBefore(this[0])
                        }
                        b1.map(function () {
                            var b2 = this;
                            while (b2.firstChild && b2.firstChild.nodeType === 1) {
                                b2 = b2.firstChild
                            }
                            return b2
                        }).append(this)
                    }
                    return this
                },
                wrapInner: function (e) {
                    if (al.isFunction(e)) {
                        return this.each(function (b1) {
                            al(this).wrapInner(e.call(this, b1))
                        })
                    }
                    return this.each(function () {
                        var b2 = al(this),
                            b1 = b2.contents();
                        if (b1.length) {
                            b1.wrapAll(e)
                        } else {
                            b2.append(e)
                        }
                    })
                },
                wrap: function (e) {
                    var b1 = al.isFunction(e);
                    return this.each(function (b2) {
                        al(this).wrapAll(b1 ? e.call(this, b2) : e)
                    })
                },
                unwrap: function () {
                    return this.parent().each(function () {
                        if (!al.nodeName(this, "body")) {
                            al(this).replaceWith(this.childNodes)
                        }
                    }).end()
                },
                append: function () {
                    return this.domManip(arguments, true, function (e) {
                        if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
                            this.appendChild(e)
                        }
                    })
                },
                prepend: function () {
                    return this.domManip(arguments, true, function (e) {
                        if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
                            this.insertBefore(e, this.firstChild)
                        }
                    })
                },
                before: function () {
                    return this.domManip(arguments, false, function (e) {
                        if (this.parentNode) {
                            this.parentNode.insertBefore(e, this)
                        }
                    })
                },
                after: function () {
                    return this.domManip(arguments, false, function (e) {
                        if (this.parentNode) {
                            this.parentNode.insertBefore(e, this.nextSibling)
                        }
                    })
                },
                remove: function (b2, b1) {
                    var e, b3 = 0;
                    for (;
                        (e = this[b3]) != null; b3++) {
                        if (!b2 || al.filter(b2, [e]).length > 0) {
                            if (!b1 && e.nodeType === 1) {
                                al.cleanData(aF(e))
                            }
                            if (e.parentNode) {
                                if (b1 && al.contains(e.ownerDocument, e)) {
                                    bz(aF(e, "script"))
                                }
                                e.parentNode.removeChild(e)
                            }
                        }
                    }
                    return this
                },
                empty: function () {
                    var b1, e = 0;
                    for (;
                        (b1 = this[e]) != null; e++) {
                        if (b1.nodeType === 1) {
                            al.cleanData(aF(b1, false))
                        }
                        while (b1.firstChild) {
                            b1.removeChild(b1.firstChild)
                        }
                        if (b1.options && al.nodeName(b1, "select")) {
                            b1.options.length = 0
                        }
                    }
                    return this
                },
                clone: function (b1, e) {
                    b1 = b1 == null ? false : b1;
                    e = e == null ? b1 : e;
                    return this.map(function () {
                        return al.clone(this, b1, e)
                    })
                },
                html: function (e) {
                    return al.access(this, function (b1) {
                        var b5 = this[0] || {}, b4 = 0,
                            b3 = this.length;
                        if (b1 === c) {
                            return b5.nodeType === 1 ? b5.innerHTML.replace(Z, "") : c
                        }
                        if (typeof b1 === "string" && !aC.test(b1) && (al.support.htmlSerialize || !ae.test(b1)) && (al.support.leadingWhitespace || !n.test(b1)) && !bq[(aJ.exec(b1) || ["", ""])[1].toLowerCase()]) {
                            b1 = b1.replace(ad, "<$1></$2>");
                            try {
                                for (; b4 < b3; b4++) {
                                    b5 = this[b4] || {};
                                    if (b5.nodeType === 1) {
                                        al.cleanData(aF(b5, false));
                                        b5.innerHTML = b1
                                    }
                                }
                                b5 = 0
                            } catch (b2) {}
                        }
                        if (b5) {
                            this.empty().append(b1)
                        }
                    }, null, e, arguments.length)
                },
                replaceWith: function (b1) {
                    var e = al.isFunction(b1);
                    if (!e && typeof b1 !== "string") {
                        b1 = al(b1).not(this).detach()
                    }
                    return this.domManip([b1], true, function (b4) {
                        var b3 = this.nextSibling,
                            b2 = this.parentNode;
                        if (b2 && this.nodeType === 1 || this.nodeType === 11) {
                            al(this).remove();
                            if (b3) {
                                b3.parentNode.insertBefore(b4, b3)
                            } else {
                                b2.appendChild(b4)
                            }
                        }
                    })
                },
                detach: function (e) {
                    return this.remove(e, true)
                },
                domManip: function (b8, ce, cd) {
                    b8 = f.apply([], b8);
                    var b7, b6, b3, b4, b1, cb, b5 = 0,
                        b2 = this.length,
                        ca = this,
                        cc = b2 - 1,
                        b9 = b8[0],
                        e = al.isFunction(b9);
                    if (e || !(b2 <= 1 || typeof b9 !== "string" || al.support.checkClone || !a4.test(b9))) {
                        return this.each(function (cg) {
                            var cf = ca.eq(cg);
                            if (e) {
                                b8[0] = b9.call(this, cg, ce ? cf.html() : c)
                            }
                            cf.domManip(b8, ce, cd)
                        })
                    }
                    if (b2) {
                        b7 = al.buildFragment(b8, this[0].ownerDocument, false, this);
                        b6 = b7.firstChild;
                        if (b7.childNodes.length === 1) {
                            b7 = b6
                        }
                        if (b6) {
                            ce = ce && al.nodeName(b6, "tr");
                            b3 = al.map(aF(b7, "script"), aX);
                            b4 = b3.length;
                            for (; b5 < b2; b5++) {
                                b1 = b7;
                                if (b5 !== cc) {
                                    b1 = al.clone(b1, true, true);
                                    if (b4) {
                                        al.merge(b3, aF(b1, "script"))
                                    }
                                }
                                cd.call(ce && al.nodeName(this[b5], "table") ? a5(this[b5], "tbody") : this[b5], b1, b5)
                            }
                            if (b4) {
                                cb = b3[b3.length - 1].ownerDocument;
                                al.map(b3, aa);
                                for (b5 = 0; b5 < b4; b5++) {
                                    b1 = b3[b5];
                                    if (ah.test(b1.type || "") && !al._data(b1, "globalEval") && al.contains(cb, b1)) {
                                        if (b1.src) {
                                            al.ajax({
                                                url: b1.src,
                                                type: "GET",
                                                dataType: "script",
                                                async: false,
                                                global: false,
                                                "throws": true
                                            })
                                        } else {
                                            al.globalEval((b1.text || b1.textContent || b1.innerHTML || "").replace(i, ""))
                                        }
                                    }
                                }
                            }
                            b7 = b6 = null
                        }
                    }
                    return this
                }
            });

            function a5(b1, e) {
                return b1.getElementsByTagName(e)[0] || b1.appendChild(b1.ownerDocument.createElement(e))
            }

            function aX(b1) {
                var e = b1.getAttributeNode("type");
                b1.type = (e && e.specified) + "/" + b1.type;
                return b1
            }

            function aa(b1) {
                var e = a3.exec(b1.type);
                if (e) {
                    b1.type = e[1]
                } else {
                    b1.removeAttribute("type")
                }
                return b1
            }

            function bz(b2, e) {
                var b1, b3 = 0;
                for (;
                    (b1 = b2[b3]) != null; b3++) {
                    al._data(b1, "globalEval", !e || al._data(e[b3], "globalEval"))
                }
            }

            function C(b4, b6) {
                if (b6.nodeType !== 1 || !al.hasData(b4)) {
                    return
                }
                var b1, e, b5, b3 = al._data(b4),
                    b2 = al._data(b6, b3),
                    b7 = b3.events;
                if (b7) {
                    delete b2.handle;
                    b2.events = {};
                    for (b1 in b7) {
                        for (e = 0, b5 = b7[b1].length; e < b5; e++) {
                            al.event.add(b6, b1, b7[b1][e])
                        }
                    }
                }
                if (b2.data) {
                    b2.data = al.extend({}, b2.data)
                }
            }

            function be(b1, b3) {
                var b2, b4, e;
                if (b3.nodeType !== 1) {
                    return
                }
                b2 = b3.nodeName.toLowerCase();
                if (!al.support.noCloneEvent && b3[al.expando]) {
                    b4 = al._data(b3);
                    for (e in b4.events) {
                        al.removeEvent(b3, e, b4.handle)
                    }
                    b3.removeAttribute(al.expando)
                }
                if (b2 === "script" && b3.text !== b1.text) {
                    aX(b3).text = b1.text;
                    aa(b3)
                } else {
                    if (b2 === "object") {
                        if (b3.parentNode) {
                            b3.outerHTML = b1.outerHTML
                        }
                        if (al.support.html5Clone && (b1.innerHTML && !al.trim(b3.innerHTML))) {
                            b3.innerHTML = b1.innerHTML
                        }
                    } else {
                        if (b2 === "input" && aR.test(b1.type)) {
                            b3.defaultChecked = b3.checked = b1.checked;
                            if (b3.value !== b1.value) {
                                b3.value = b1.value
                            }
                        } else {
                            if (b2 === "option") {
                                b3.defaultSelected = b3.selected = b1.defaultSelected
                            } else {
                                if (b2 === "input" || b2 === "textarea") {
                                    b3.defaultValue = b1.defaultValue
                                }
                            }
                        }
                    }
                }
            }
            al.each({
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith"
            }, function (e, b1) {
                al.fn[e] = function (b5) {
                    var b6, b2 = 0,
                        b7 = [],
                        b4 = al(b5),
                        b3 = b4.length - 1;
                    for (; b2 <= b3; b2++) {
                        b6 = b2 === b3 ? this : this.clone(true);
                        al(b4[b2])[b1](b6);
                        aO.apply(b7, b6.get())
                    }
                    return this.pushStack(b7)
                }
            });

            function aF(e, b3) {
                var b4, b1, b5 = 0,
                    b2 = typeof e.getElementsByTagName !== "undefined" ? e.getElementsByTagName(b3 || "*") : typeof e.querySelectorAll !== "undefined" ? e.querySelectorAll(b3 || "*") : c;
                if (!b2) {
                    for (b2 = [], b4 = e.childNodes || e;
                        (b1 = b4[b5]) != null; b5++) {
                        if (!b3 || al.nodeName(b1, b3)) {
                            b2.push(b1)
                        } else {
                            al.merge(b2, aF(b1, b3))
                        }
                    }
                }
                return b3 === c || b3 && al.nodeName(e, b3) ? al.merge([e], b2) : b2
            }

            function a7(e) {
                if (aR.test(e.type)) {
                    e.defaultChecked = e.checked
                }
            }
            al.extend({
                clone: function (e, b2, b4) {
                    var b5, b6, b1, b3, b8, b7 = al.contains(e.ownerDocument, e);
                    if (al.support.html5Clone || al.isXMLDoc(e) || !ae.test("<" + e.nodeName + ">")) {
                        b8 = e.cloneNode(true)
                    } else {
                        aD.innerHTML = e.outerHTML;
                        aD.removeChild(b8 = aD.firstChild)
                    } if ((!al.support.noCloneEvent || !al.support.noCloneChecked) && (e.nodeType === 1 || e.nodeType === 11) && !al.isXMLDoc(e)) {
                        b5 = aF(b8);
                        b6 = aF(e);
                        for (b3 = 0;
                            (b1 = b6[b3]) != null; ++b3) {
                            if (b5[b3]) {
                                be(b1, b5[b3])
                            }
                        }
                    }
                    if (b2) {
                        if (b4) {
                            b6 = b6 || aF(e);
                            b5 = b5 || aF(b8);
                            for (b3 = 0;
                                (b1 = b6[b3]) != null; b3++) {
                                C(b1, b5[b3])
                            }
                        } else {
                            C(e, b8)
                        }
                    }
                    b5 = aF(b8, "script");
                    if (b5.length > 0) {
                        bz(b5, !b7 && aF(e, "script"))
                    }
                    b5 = b6 = b1 = null;
                    return b8
                },
                buildFragment: function (e, b2, b8, cd) {
                    var b7, b4, ce, cc, b1, cb, b9, b6 = e.length,
                        b3 = O(b2),
                        b5 = [],
                        ca = 0;
                    for (; ca < b6; ca++) {
                        b4 = e[ca];
                        if (b4 || b4 === 0) {
                            if (al.type(b4) === "object") {
                                al.merge(b5, b4.nodeType ? [b4] : b4)
                            } else {
                                if (!ac.test(b4)) {
                                    b5.push(b2.createTextNode(b4))
                                } else {
                                    cc = cc || b3.appendChild(b2.createElement("div"));
                                    ce = (aJ.exec(b4) || ["", ""])[1].toLowerCase();
                                    b1 = bq[ce] || bq._default;
                                    cc.innerHTML = b1[1] + b4.replace(ad, "<$1></$2>") + b1[2];
                                    b9 = b1[0];
                                    while (b9--) {
                                        cc = cc.lastChild
                                    }
                                    if (!al.support.leadingWhitespace && n.test(b4)) {
                                        b5.push(b2.createTextNode(n.exec(b4)[0]))
                                    }
                                    if (!al.support.tbody) {
                                        b4 = ce === "table" && !E.test(b4) ? cc.firstChild : b1[1] === "<table>" && !E.test(b4) ? cc : 0;
                                        b9 = b4 && b4.childNodes.length;
                                        while (b9--) {
                                            if (al.nodeName((cb = b4.childNodes[b9]), "tbody") && !cb.childNodes.length) {
                                                b4.removeChild(cb)
                                            }
                                        }
                                    }
                                    al.merge(b5, cc.childNodes);
                                    cc.textContent = "";
                                    while (cc.firstChild) {
                                        cc.removeChild(cc.firstChild)
                                    }
                                    cc = b3.lastChild
                                }
                            }
                        }
                    }
                    if (cc) {
                        b3.removeChild(cc)
                    }
                    if (!al.support.appendChecked) {
                        al.grep(aF(b5, "input"), a7)
                    }
                    ca = 0;
                    while ((b4 = b5[ca++])) {
                        if (cd && al.inArray(b4, cd) !== -1) {
                            continue
                        }
                        b7 = al.contains(b4.ownerDocument, b4);
                        cc = aF(b3.appendChild(b4), "script");
                        if (b7) {
                            bz(cc)
                        }
                        if (b8) {
                            b9 = 0;
                            while ((b4 = cc[b9++])) {
                                if (ah.test(b4.type || "")) {
                                    b8.push(b4)
                                }
                            }
                        }
                    }
                    cc = null;
                    return b3
                },
                cleanData: function (e, b9) {
                    var b3, b1, b2, b8, b4 = 0,
                        ca = al.expando,
                        b5 = al.cache,
                        b6 = al.support.deleteExpando,
                        b7 = al.event.special;
                    for (;
                        (b2 = e[b4]) != null; b4++) {
                        if (b9 || al.acceptData(b2)) {
                            b1 = b2[ca];
                            b3 = b1 && b5[b1];
                            if (b3) {
                                if (b3.events) {
                                    for (b8 in b3.events) {
                                        if (b7[b8]) {
                                            al.event.remove(b2, b8)
                                        } else {
                                            al.removeEvent(b2, b8, b3.handle)
                                        }
                                    }
                                }
                                if (b5[b1]) {
                                    delete b5[b1];
                                    if (b6) {
                                        delete b2[ca]
                                    } else {
                                        if (typeof b2.removeAttribute !== "undefined") {
                                            b2.removeAttribute(ca)
                                        } else {
                                            b2[ca] = null
                                        }
                                    }
                                    b0.push(b1)
                                }
                            }
                        }
                    }
                }
            });
            var S, bp, af, bN = /alpha\([^)]*\)/i,
                s = /opacity\s*=\s*([^)]*)/,
                bl = /^(top|right|bottom|left)$/,
                T = /^(none|table(?!-c[ea]).+)/,
                x = /^margin/,
                Y = new RegExp("^(" + ak + ")(.*)$", "i"),
                by = new RegExp("^(" + ak + ")(?!px)[a-z%]+$", "i"),
                bn = new RegExp("^([+-])=(" + ak + ")", "i"),
                a9 = {
                    BODY: "block"
                }, W = {
                    position: "absolute",
                    visibility: "hidden",
                    display: "block"
                }, A = {
                    letterSpacing: 0,
                    fontWeight: 400
                }, a0 = ["Top", "Right", "Bottom", "Left"],
                F = ["Webkit", "O", "Moz", "ms"];

            function ao(e, b3) {
                if (b3 in e) {
                    return b3
                }
                var b1 = b3.charAt(0).toUpperCase() + b3.slice(1),
                    b2 = b3,
                    b4 = F.length;
                while (b4--) {
                    b3 = F[b4] + b1;
                    if (b3 in e) {
                        return b3
                    }
                }
                return b2
            }

            function bb(b1, e) {
                b1 = e || b1;
                return al.css(b1, "display") === "none" || !al.contains(b1.ownerDocument, b1)
            }

            function aP(b2, b3) {
                var b1, b4 = [],
                    b5 = 0,
                    e = b2.length;
                for (; b5 < e; b5++) {
                    b1 = b2[b5];
                    if (!b1.style) {
                        continue
                    }
                    b4[b5] = al._data(b1, "olddisplay");
                    if (b3) {
                        if (!b4[b5] && b1.style.display === "none") {
                            b1.style.display = ""
                        }
                        if (b1.style.display === "" && bb(b1)) {
                            b4[b5] = al._data(b1, "olddisplay", bf(b1.nodeName))
                        }
                    } else {
                        if (!b4[b5] && !bb(b1)) {
                            al._data(b1, "olddisplay", al.css(b1, "display"))
                        }
                    }
                }
                for (b5 = 0; b5 < e; b5++) {
                    b1 = b2[b5];
                    if (!b1.style) {
                        continue
                    }
                    if (!b3 || b1.style.display === "none" || b1.style.display === "") {
                        b1.style.display = b3 ? b4[b5] || "" : "none"
                    }
                }
                return b2
            }
            al.fn.extend({
                css: function (e, b1) {
                    return al.access(this, function (b3, b7, b4) {
                        var b2, b6, b5 = {}, b8 = 0;
                        if (al.isArray(b7)) {
                            b2 = bp(b3);
                            b6 = b7.length;
                            for (; b8 < b6; b8++) {
                                b5[b7[b8]] = al.css(b3, b7[b8], false, b2)
                            }
                            return b5
                        }
                        return b4 !== c ? al.style(b3, b7, b4) : al.css(b3, b7)
                    }, e, b1, arguments.length > 1)
                },
                show: function () {
                    return aP(this, true)
                },
                hide: function () {
                    return aP(this)
                },
                toggle: function (b1) {
                    var e = typeof b1 === "boolean";
                    return this.each(function () {
                        if (e ? b1 : bb(this)) {
                            al(this).show()
                        } else {
                            al(this).hide()
                        }
                    })
                }
            });
            al.extend({
                cssHooks: {
                    opacity: {
                        get: function (b1, e) {
                            if (e) {
                                var b2 = S(b1, "opacity");
                                return b2 === "" ? "1" : b2
                            }
                        }
                    }
                },
                cssNumber: {
                    columnCount: true,
                    fillOpacity: true,
                    fontWeight: true,
                    lineHeight: true,
                    opacity: true,
                    orphans: true,
                    widows: true,
                    zIndex: true,
                    zoom: true
                },
                cssProps: {
                    "float": al.support.cssFloat ? "cssFloat" : "styleFloat"
                },
                style: function (b2, b1, b8, b3) {
                    if (!b2 || b2.nodeType === 3 || b2.nodeType === 8 || !b2.style) {
                        return
                    }
                    var b6, b7, b9, b4 = al.camelCase(b1),
                        e = b2.style;
                    b1 = al.cssProps[b4] || (al.cssProps[b4] = ao(e, b4));
                    b9 = al.cssHooks[b1] || al.cssHooks[b4];
                    if (b8 !== c) {
                        b7 = typeof b8;
                        if (b7 === "string" && (b6 = bn.exec(b8))) {
                            b8 = (b6[1] + 1) * b6[2] + parseFloat(al.css(b2, b1));
                            b7 = "number"
                        }
                        if (b8 == null || b7 === "number" && isNaN(b8)) {
                            return
                        }
                        if (b7 === "number" && !al.cssNumber[b4]) {
                            b8 += "px"
                        }
                        if (!al.support.clearCloneStyle && b8 === "" && b1.indexOf("background") === 0) {
                            e[b1] = "inherit"
                        }
                        if (!b9 || !("set" in b9) || (b8 = b9.set(b2, b8, b3)) !== c) {
                            try {
                                e[b1] = b8
                            } catch (b5) {}
                        }
                    } else {
                        if (b9 && "get" in b9 && (b6 = b9.get(b2, false, b3)) !== c) {
                            return b6
                        }
                        return e[b1]
                    }
                },
                css: function (b3, b1, b6, b2) {
                    var b4, e, b5, b7 = al.camelCase(b1);
                    b1 = al.cssProps[b7] || (al.cssProps[b7] = ao(b3.style, b7));
                    b5 = al.cssHooks[b1] || al.cssHooks[b7];
                    if (b5 && "get" in b5) {
                        b4 = b5.get(b3, true, b6)
                    }
                    if (b4 === c) {
                        b4 = S(b3, b1, b2)
                    }
                    if (b4 === "normal" && b1 in A) {
                        b4 = A[b1]
                    }
                    if (b6) {
                        e = parseFloat(b4);
                        return b6 === true || al.isNumeric(e) ? e || 0 : b4
                    }
                    return b4
                },
                swap: function (b2, b1, b3, e) {
                    var b6, b5, b4 = {};
                    for (b5 in b1) {
                        b4[b5] = b2.style[b5];
                        b2.style[b5] = b1[b5]
                    }
                    b6 = b3.apply(b2, e || []);
                    for (b5 in b1) {
                        b2.style[b5] = b4[b5]
                    }
                    return b6
                }
            });
            if (bW.getComputedStyle) {
                bp = function (e) {
                    return bW.getComputedStyle(e, null)
                };
                S = function (b3, b1, b6) {
                    var b2, e, b8, b4 = b6 || bp(b3),
                        b7 = b4 ? b4.getPropertyValue(b1) || b4[b1] : c,
                        b5 = b3.style;
                    if (b4) {
                        if (b7 === "" && !al.contains(b3.ownerDocument, b3)) {
                            b7 = al.style(b3, b1)
                        }
                        if (by.test(b7) && x.test(b1)) {
                            b2 = b5.width;
                            e = b5.minWidth;
                            b8 = b5.maxWidth;
                            b5.minWidth = b5.maxWidth = b5.width = b7;
                            b7 = b4.width;
                            b5.width = b2;
                            b5.minWidth = e;
                            b5.maxWidth = b8
                        }
                    }
                    return b7
                }
            } else {
                if (aG.documentElement.currentStyle) {
                    bp = function (e) {
                        return e.currentStyle
                    };
                    S = function (b2, e, b6) {
                        var b1, b4, b7, b3 = b6 || bp(b2),
                            b8 = b3 ? b3[e] : c,
                            b5 = b2.style;
                        if (b8 == null && b5 && b5[e]) {
                            b8 = b5[e]
                        }
                        if (by.test(b8) && !bl.test(e)) {
                            b1 = b5.left;
                            b4 = b2.runtimeStyle;
                            b7 = b4 && b4.left;
                            if (b7) {
                                b4.left = b2.currentStyle.left
                            }
                            b5.left = e === "fontSize" ? "1em" : b8;
                            b8 = b5.pixelLeft + "px";
                            b5.left = b1;
                            if (b7) {
                                b4.left = b7
                            }
                        }
                        return b8 === "" ? "auto" : b8
                    }
                }
            }

            function h(b2, e, b1) {
                var b3 = Y.exec(e);
                return b3 ? Math.max(0, b3[1] - (b1 || 0)) + (b3[2] || "px") : e
            }

            function H(b1, b5, b4, b3, e) {
                var b6 = b4 === (b3 ? "border" : "content") ? 4 : b5 === "width" ? 1 : 0,
                    b2 = 0;
                for (; b6 < 4; b6 += 2) {
                    if (b4 === "margin") {
                        b2 += al.css(b1, b4 + a0[b6], true, e)
                    }
                    if (b3) {
                        if (b4 === "content") {
                            b2 -= al.css(b1, "padding" + a0[b6], true, e)
                        }
                        if (b4 !== "margin") {
                            b2 -= al.css(b1, "border" + a0[b6] + "Width", true, e)
                        }
                    } else {
                        b2 += al.css(b1, "padding" + a0[b6], true, e);
                        if (b4 !== "padding") {
                            b2 += al.css(b1, "border" + a0[b6] + "Width", true, e)
                        }
                    }
                }
                return b2
            }

            function aZ(b1, b5, b4) {
                var e = true,
                    b2 = b5 === "width" ? b1.offsetWidth : b1.offsetHeight,
                    b6 = bp(b1),
                    b3 = al.support.boxSizing && al.css(b1, "boxSizing", false, b6) === "border-box";
                if (b2 <= 0 || b2 == null) {
                    b2 = S(b1, b5, b6);
                    if (b2 < 0 || b2 == null) {
                        b2 = b1.style[b5]
                    }
                    if (by.test(b2)) {
                        return b2
                    }
                    e = b3 && (al.support.boxSizingReliable || b2 === b1.style[b5]);
                    b2 = parseFloat(b2) || 0
                }
                return (b2 + H(b1, b5, b4 || (b3 ? "border" : "content"), e, b6)) + "px"
            }

            function bf(b1) {
                var e = aG,
                    b2 = a9[b1];
                if (!b2) {
                    b2 = bV(b1, e);
                    if (b2 === "none" || !b2) {
                        af = (af || al("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(e.documentElement);
                        e = (af[0].contentWindow || af[0].contentDocument).document;
                        e.write("<!doctype html><html><body>");
                        e.close();
                        b2 = bV(b1, e);
                        af.detach()
                    }
                    a9[b1] = b2
                }
                return b2
            }

            function bV(b2, b1) {
                var b3 = al(b1.createElement(b2)).appendTo(b1.body),
                    e = al.css(b3[0], "display");
                b3.remove();
                return e
            }
            al.each(["height", "width"], function (b1, e) {
                al.cssHooks[e] = {
                    get: function (b4, b3, b2) {
                        if (b3) {
                            return b4.offsetWidth === 0 && T.test(al.css(b4, "display")) ? al.swap(b4, W, function () {
                                return aZ(b4, e, b2)
                            }) : aZ(b4, e, b2)
                        }
                    },
                    set: function (b5, b2, b3) {
                        var b4 = b3 && bp(b5);
                        return h(b5, b2, b3 ? H(b5, e, b3, al.support.boxSizing && al.css(b5, "boxSizing", false, b4) === "border-box", b4) : 0)
                    }
                }
            });
            if (!al.support.opacity) {
                al.cssHooks.opacity = {
                    get: function (b1, e) {
                        return s.test((e && b1.currentStyle ? b1.currentStyle.filter : b1.style.filter) || "") ? (0.01 * parseFloat(RegExp.$1)) + "" : e ? "1" : ""
                    },
                    set: function (b1, b2) {
                        var e = b1.style,
                            b4 = b1.currentStyle,
                            b3 = al.isNumeric(b2) ? "alpha(opacity=" + b2 * 100 + ")" : "",
                            b5 = b4 && b4.filter || e.filter || "";
                        e.zoom = 1;
                        if ((b2 >= 1 || b2 === "") && al.trim(b5.replace(bN, "")) === "" && e.removeAttribute) {
                            e.removeAttribute("filter");
                            if (b2 === "" || b4 && !b4.filter) {
                                return
                            }
                        }
                        e.filter = bN.test(b5) ? b5.replace(bN, b3) : b5 + " " + b3
                    }
                }
            }
            al(function () {
                if (!al.support.reliableMarginRight) {
                    al.cssHooks.marginRight = {
                        get: function (b1, e) {
                            if (e) {
                                return al.swap(b1, {
                                    display: "inline-block"
                                }, S, [b1, "marginRight"])
                            }
                        }
                    }
                }
                if (!al.support.pixelPosition && al.fn.position) {
                    al.each(["top", "left"], function (e, b1) {
                        al.cssHooks[b1] = {
                            get: function (b3, b2) {
                                if (b2) {
                                    b2 = S(b3, b1);
                                    return by.test(b2) ? al(b3).position()[b1] + "px" : b2
                                }
                            }
                        }
                    })
                }
            });
            if (al.expr && al.expr.filters) {
                al.expr.filters.hidden = function (e) {
                    return (e.offsetWidth === 0 && e.offsetHeight === 0) || (!al.support.reliableHiddenOffsets && ((e.style && e.style.display) || al.css(e, "display")) === "none")
                };
                al.expr.filters.visible = function (e) {
                    return !al.expr.filters.hidden(e)
                }
            }
            al.each({
                margin: "",
                padding: "",
                border: "Width"
            }, function (e, b1) {
                al.cssHooks[e + b1] = {
                    expand: function (b5) {
                        var b4 = 0,
                            b3 = {}, b2 = typeof b5 === "string" ? b5.split(" ") : [b5];
                        for (; b4 < 4; b4++) {
                            b3[e + a0[b4] + b1] = b2[b4] || b2[b4 - 2] || b2[0]
                        }
                        return b3
                    }
                };
                if (!x.test(e)) {
                    al.cssHooks[e + b1].set = h
                }
            });
            var bF = /%20/g,
                q = /\[\]$/,
                bt = /\r?\n/g,
                aq = /^(?:submit|button|image|reset)$/i,
                D = /^(?:input|select|textarea|keygen)/i;
            al.fn.extend({
                serialize: function () {
                    return al.param(this.serializeArray())
                },
                serializeArray: function () {
                    return this.map(function () {
                        var e = al.prop(this, "elements");
                        return e ? al.makeArray(e) : this
                    }).filter(function () {
                        var e = this.type;
                        return this.name && !al(this).is(":disabled") && D.test(this.nodeName) && !aq.test(e) && (this.checked || !aR.test(e))
                    }).map(function (b2, e) {
                        var b1 = al(this).val();
                        return b1 == null ? null : al.isArray(b1) ? al.map(b1, function (b3) {
                            return {
                                name: e.name,
                                value: b3.replace(bt, "\r\n")
                            }
                        }) : {
                            name: e.name,
                            value: b1.replace(bt, "\r\n")
                        }
                    }).get()
                }
            });
            al.param = function (b2, b4) {
                var e, b3 = [],
                    b1 = function (b5, b6) {
                        b6 = al.isFunction(b6) ? b6() : (b6 == null ? "" : b6);
                        b3[b3.length] = encodeURIComponent(b5) + "=" + encodeURIComponent(b6)
                    };
                if (b4 === c) {
                    b4 = al.ajaxSettings && al.ajaxSettings.traditional
                }
                if (al.isArray(b2) || (b2.jquery && !al.isPlainObject(b2))) {
                    al.each(b2, function () {
                        b1(this.name, this.value)
                    })
                } else {
                    for (e in b2) {
                        aB(e, b2[e], b4, b1)
                    }
                }
                return b3.join("&").replace(bF, "+")
            };

            function aB(b4, b1, b3, e) {
                var b2;
                if (al.isArray(b1)) {
                    al.each(b1, function (b6, b5) {
                        if (b3 || q.test(b4)) {
                            e(b4, b5)
                        } else {
                            aB(b4 + "[" + (typeof b5 === "object" ? b6 : "") + "]", b5, b3, e)
                        }
                    })
                } else {
                    if (!b3 && al.type(b1) === "object") {
                        for (b2 in b1) {
                            aB(b4 + "[" + b2 + "]", b1[b2], b3, e)
                        }
                    } else {
                        e(b4, b1)
                    }
                }
            }
            var L, bC, aH = al.now(),
                N = /\?/,
                aS = /#.*$/,
                a8 = /([?&])_=[^&]*/,
                br = /^(.*?):[ \t]*([^\r\n]*)\r?$/mg,
                P = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
                aN = /^(?:GET|HEAD)$/,
                d = /^\/\//,
                t = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
                J = al.fn.load,
                a1 = {}, a = {}, v = "*/".concat("*");
            try {
                bC = j.href
            } catch (bL) {
                bC = aG.createElement("a");
                bC.href = "";
                bC = bC.href
            }
            L = t.exec(bC.toLowerCase()) || [];

            function av(e) {
                return function (b1, b2) {
                    if (typeof b1 !== "string") {
                        b2 = b1;
                        b1 = "*"
                    }
                    var b3, b4 = 0,
                        b5 = b1.toLowerCase().match(bh) || [];
                    if (al.isFunction(b2)) {
                        while ((b3 = b5[b4++])) {
                            if (b3[0] === "+") {
                                b3 = b3.slice(1) || "*";
                                (e[b3] = e[b3] || []).unshift(b2)
                            } else {
                                (e[b3] = e[b3] || []).push(b2)
                            }
                        }
                    }
                }
            }

            function aL(b4, b6, b3, e) {
                var b5 = {}, b1 = (b4 === a);

                function b2(b7) {
                    var b8;
                    b5[b7] = true;
                    al.each(b4[b7] || [], function (ca, b9) {
                        var cb = b9(b6, b3, e);
                        if (typeof cb === "string" && !b1 && !b5[cb]) {
                            b6.dataTypes.unshift(cb);
                            b2(cb);
                            return false
                        } else {
                            if (b1) {
                                return !(b8 = cb)
                            }
                        }
                    });
                    return b8
                }
                return b2(b6.dataTypes[0]) || !b5["*"] && b2("*")
            }

            function aT(b4, e) {
                var b3, b2, b1 = al.ajaxSettings.flatOptions || {};
                for (b3 in e) {
                    if (e[b3] !== c) {
                        (b1[b3] ? b4 : (b2 || (b2 = {})))[b3] = e[b3]
                    }
                }
                if (b2) {
                    al.extend(true, b4, b2)
                }
                return b4
            }
            al.fn.load = function (e, b3, b4) {
                if (typeof e !== "string" && J) {
                    return J.apply(this, arguments)
                }
                var b5, b1, b7, b6 = this,
                    b2 = e.indexOf(" ");
                if (b2 >= 0) {
                    b5 = e.slice(b2, e.length);
                    e = e.slice(0, b2)
                }
                if (al.isFunction(b3)) {
                    b4 = b3;
                    b3 = c
                } else {
                    if (b3 && typeof b3 === "object") {
                        b1 = "POST"
                    }
                } if (b6.length > 0) {
                    al.ajax({
                        url: e,
                        type: b1,
                        dataType: "html",
                        data: b3
                    }).done(function (b8) {
                        b7 = arguments;
                        b6.html(b5 ? al("<div>").append(al.parseHTML(b8)).find(b5) : b8)
                    }).complete(b4 && function (b9, b8) {
                        b6.each(b4, b7 || [b9.responseText, b8, b9])
                    })
                }
                return this
            };
            al.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (e, b1) {
                al.fn[b1] = function (b2) {
                    return this.on(b1, b2)
                }
            });
            al.each(["get", "post"], function (e, b1) {
                al[b1] = function (b3, b5, b2, b4) {
                    if (al.isFunction(b5)) {
                        b4 = b4 || b2;
                        b2 = b5;
                        b5 = c
                    }
                    return al.ajax({
                        url: b3,
                        type: b1,
                        dataType: b4,
                        data: b5,
                        success: b2
                    })
                }
            });
            al.extend({
                active: 0,
                lastModified: {},
                etag: {},
                ajaxSettings: {
                    url: bC,
                    type: "GET",
                    isLocal: P.test(L[1]),
                    global: true,
                    processData: true,
                    async: true,
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    accepts: {
                        "*": v,
                        text: "text/plain",
                        html: "text/html",
                        xml: "application/xml, text/xml",
                        json: "application/json, text/javascript"
                    },
                    contents: {
                        xml: /xml/,
                        html: /html/,
                        json: /json/
                    },
                    responseFields: {
                        xml: "responseXML",
                        text: "responseText"
                    },
                    converters: {
                        "* text": bW.String,
                        "text html": true,
                        "text json": al.parseJSON,
                        "text xml": al.parseXML
                    },
                    flatOptions: {
                        url: true,
                        context: true
                    }
                },
                ajaxSetup: function (b1, e) {
                    return e ? aT(aT(b1, al.ajaxSettings), e) : aT(al.ajaxSettings, b1)
                },
                ajaxPrefilter: av(a1),
                ajaxTransport: av(a),
                ajax: function (ci, cf) {
                    if (typeof ci === "object") {
                        cf = ci;
                        ci = c
                    }
                    cf = cf || {};
                    var b7, cj, cb, cg, e, b4, ce, b6, cm = al.ajaxSetup({}, cf),
                        cd = cm.context || cm,
                        b2 = cm.context && (cd.nodeType || cd.jquery) ? al(cd) : al.event,
                        cc = al.Deferred(),
                        b9 = al.Callbacks("once memory"),
                        ck = cm.statusCode || {}, b3 = {}, ca = {}, ch = 0,
                        cl = "canceled",
                        b5 = {
                            readyState: 0,
                            getResponseHeader: function (cn) {
                                var co;
                                if (ch === 2) {
                                    if (!cg) {
                                        cg = {};
                                        while ((co = br.exec(cb))) {
                                            cg[co[1].toLowerCase()] = co[2]
                                        }
                                    }
                                    co = cg[cn.toLowerCase()]
                                }
                                return co == null ? null : co
                            },
                            getAllResponseHeaders: function () {
                                return ch === 2 ? cb : null
                            },
                            setRequestHeader: function (cn, co) {
                                var cp = cn.toLowerCase();
                                if (!ch) {
                                    cn = ca[cp] = ca[cp] || cn;
                                    b3[cn] = co
                                }
                                return this
                            },
                            overrideMimeType: function (cn) {
                                if (!ch) {
                                    cm.mimeType = cn
                                }
                                return this
                            },
                            statusCode: function (cn) {
                                var co;
                                if (cn) {
                                    if (ch < 2) {
                                        for (co in cn) {
                                            ck[co] = [ck[co], cn[co]]
                                        }
                                    } else {
                                        b5.always(cn[b5.status])
                                    }
                                }
                                return this
                            },
                            abort: function (cn) {
                                var co = cn || cl;
                                if (b7) {
                                    b7.abort(co)
                                }
                                b1(0, co);
                                return this
                            }
                        };
                    cc.promise(b5).complete = b9.add;
                    b5.success = b5.done;
                    b5.error = b5.fail;
                    cm.url = ((ci || cm.url || bC) + "").replace(aS, "").replace(d, L[1] + "//");
                    cm.type = cf.method || cf.type || cm.method || cm.type;
                    cm.dataTypes = al.trim(cm.dataType || "*").toLowerCase().match(bh) || [""];
                    if (cm.crossDomain == null) {
                        b4 = t.exec(cm.url.toLowerCase());
                        cm.crossDomain = !! (b4 && (b4[1] !== L[1] || b4[2] !== L[2] || (b4[3] || (b4[1] === "http:" ? 80 : 443)) != (L[3] || (L[1] === "http:" ? 80 : 443))))
                    }
                    if (cm.data && cm.processData && typeof cm.data !== "string") {
                        cm.data = al.param(cm.data, cm.traditional)
                    }
                    aL(a1, cm, cf, b5);
                    if (ch === 2) {
                        return b5
                    }
                    ce = cm.global;
                    if (ce && al.active++ === 0) {
                        al.event.trigger("ajaxStart")
                    }
                    cm.type = cm.type.toUpperCase();
                    cm.hasContent = !aN.test(cm.type);
                    cj = cm.url;
                    if (!cm.hasContent) {
                        if (cm.data) {
                            cj = (cm.url += (N.test(cj) ? "&" : "?") + cm.data);
                            delete cm.data
                        }
                        if (cm.cache === false) {
                            cm.url = a8.test(cj) ? cj.replace(a8, "$1_=" + aH++) : cj + (N.test(cj) ? "&" : "?") + "_=" + aH++
                        }
                    }
                    if (cm.ifModified) {
                        if (al.lastModified[cj]) {
                            b5.setRequestHeader("If-Modified-Since", al.lastModified[cj])
                        }
                        if (al.etag[cj]) {
                            b5.setRequestHeader("If-None-Match", al.etag[cj])
                        }
                    }
                    if (cm.data && cm.hasContent && cm.contentType !== false || cf.contentType) {
                        b5.setRequestHeader("Content-Type", cm.contentType)
                    }
                    b5.setRequestHeader("Accept", cm.dataTypes[0] && cm.accepts[cm.dataTypes[0]] ? cm.accepts[cm.dataTypes[0]] + (cm.dataTypes[0] !== "*" ? ", " + v + "; q=0.01" : "") : cm.accepts["*"]);
                    for (b6 in cm.headers) {
                        b5.setRequestHeader(b6, cm.headers[b6])
                    }
                    if (cm.beforeSend && (cm.beforeSend.call(cd, b5, cm) === false || ch === 2)) {
                        return b5.abort()
                    }
                    cl = "abort";
                    for (b6 in {
                        success: 1,
                        error: 1,
                        complete: 1
                    }) {
                        b5[b6](cm[b6])
                    }
                    b7 = aL(a, cm, cf, b5);
                    if (!b7) {
                        b1(-1, "No Transport")
                    } else {
                        b5.readyState = 1;
                        if (ce) {
                            b2.trigger("ajaxSend", [b5, cm])
                        }
                        if (cm.async && cm.timeout > 0) {
                            e = setTimeout(function () {
                                b5.abort("timeout")
                            }, cm.timeout)
                        }
                        try {
                            ch = 1;
                            b7.send(b3, b1)
                        } catch (b8) {
                            if (ch < 2) {
                                b1(-1, b8)
                            } else {
                                throw b8
                            }
                        }
                    }

                    function b1(co, ct, cp, cv) {
                        var cn, cs, cq, cw, cr, cu = ct;
                        if (ch === 2) {
                            return
                        }
                        ch = 2;
                        if (e) {
                            clearTimeout(e)
                        }
                        b7 = c;
                        cb = cv || "";
                        b5.readyState = co > 0 ? 4 : 0;
                        if (cp) {
                            cw = ax(cm, b5, cp)
                        }
                        if (co >= 200 && co < 300 || co === 304) {
                            if (cm.ifModified) {
                                cr = b5.getResponseHeader("Last-Modified");
                                if (cr) {
                                    al.lastModified[cj] = cr
                                }
                                cr = b5.getResponseHeader("etag");
                                if (cr) {
                                    al.etag[cj] = cr
                                }
                            }
                            if (co === 304) {
                                cn = true;
                                cu = "notmodified"
                            } else {
                                cn = ai(cm, cw);
                                cu = cn.state;
                                cs = cn.data;
                                cq = cn.error;
                                cn = !cq
                            }
                        } else {
                            cq = cu;
                            if (co || !cu) {
                                cu = "error";
                                if (co < 0) {
                                    co = 0
                                }
                            }
                        }
                        b5.status = co;
                        b5.statusText = (ct || cu) + "";
                        if (cn) {
                            cc.resolveWith(cd, [cs, cu, b5])
                        } else {
                            cc.rejectWith(cd, [b5, cu, cq])
                        }
                        b5.statusCode(ck);
                        ck = c;
                        if (ce) {
                            b2.trigger(cn ? "ajaxSuccess" : "ajaxError", [b5, cm, cn ? cs : cq])
                        }
                        b9.fireWith(cd, [b5, cu]);
                        if (ce) {
                            b2.trigger("ajaxComplete", [b5, cm]);
                            if (!(--al.active)) {
                                al.event.trigger("ajaxStop")
                            }
                        }
                    }
                    return b5
                },
                getScript: function (e, b1) {
                    return al.get(e, c, b1, "script")
                },
                getJSON: function (b2, e, b1) {
                    return al.get(b2, e, b1, "json")
                }
            });

            function ax(b9, b8, b5) {
                var b3, b6, b2, b4, e = b9.contents,
                    b7 = b9.dataTypes,
                    b1 = b9.responseFields;
                for (b6 in b1) {
                    if (b6 in b5) {
                        b8[b1[b6]] = b5[b6]
                    }
                }
                while (b7[0] === "*") {
                    b7.shift();
                    if (b3 === c) {
                        b3 = b9.mimeType || b8.getResponseHeader("Content-Type")
                    }
                }
                if (b3) {
                    for (b6 in e) {
                        if (e[b6] && e[b6].test(b3)) {
                            b7.unshift(b6);
                            break
                        }
                    }
                }
                if (b7[0] in b5) {
                    b2 = b7[0]
                } else {
                    for (b6 in b5) {
                        if (!b7[0] || b9.converters[b6 + " " + b7[0]]) {
                            b2 = b6;
                            break
                        }
                        if (!b4) {
                            b4 = b6
                        }
                    }
                    b2 = b2 || b4
                } if (b2) {
                    if (b2 !== b7[0]) {
                        b7.unshift(b2)
                    }
                    return b5[b2]
                }
            }

            function ai(ca, b2) {
                var b8, e, b6, b3, b9 = {}, b4 = 0,
                    b7 = ca.dataTypes.slice(),
                    b1 = b7[0];
                if (ca.dataFilter) {
                    b2 = ca.dataFilter(b2, ca.dataType)
                }
                if (b7[1]) {
                    for (b8 in ca.converters) {
                        b9[b8.toLowerCase()] = ca.converters[b8]
                    }
                }
                for (;
                    (b6 = b7[++b4]);) {
                    if (b6 !== "*") {
                        if (b1 !== "*" && b1 !== b6) {
                            b8 = b9[b1 + " " + b6] || b9["* " + b6];
                            if (!b8) {
                                for (e in b9) {
                                    b3 = e.split(" ");
                                    if (b3[1] === b6) {
                                        b8 = b9[b1 + " " + b3[0]] || b9["* " + b3[0]];
                                        if (b8) {
                                            if (b8 === true) {
                                                b8 = b9[e]
                                            } else {
                                                if (b9[e] !== true) {
                                                    b6 = b3[0];
                                                    b7.splice(b4--, 0, b6)
                                                }
                                            }
                                            break
                                        }
                                    }
                                }
                            }
                            if (b8 !== true) {
                                if (b8 && ca["throws"]) {
                                    b2 = b8(b2)
                                } else {
                                    try {
                                        b2 = b8(b2)
                                    } catch (b5) {
                                        return {
                                            state: "parsererror",
                                            error: b8 ? b5 : "No conversion from " + b1 + " to " + b6
                                        }
                                    }
                                }
                            }
                        }
                        b1 = b6
                    }
                }
                return {
                    state: "success",
                    data: b2
                }
            }
            al.ajaxSetup({
                accepts: {
                    script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
                },
                contents: {
                    script: /(?:java|ecma)script/
                },
                converters: {
                    "text script": function (e) {
                        al.globalEval(e);
                        return e
                    }
                }
            });
            al.ajaxPrefilter("script", function (e) {
                if (e.cache === c) {
                    e.cache = false
                }
                if (e.crossDomain) {
                    e.type = "GET";
                    e.global = false
                }
            });
            al.ajaxTransport("script", function (b1) {
                if (b1.crossDomain) {
                    var b2, e = aG.head || al("head")[0] || aG.documentElement;
                    return {
                        send: function (b3, b4) {
                            b2 = aG.createElement("script");
                            b2.async = true;
                            if (b1.scriptCharset) {
                                b2.charset = b1.scriptCharset
                            }
                            b2.src = b1.url;
                            b2.onload = b2.onreadystatechange = function (b6, b5) {
                                if (b5 || !b2.readyState || /loaded|complete/.test(b2.readyState)) {
                                    b2.onload = b2.onreadystatechange = null;
                                    if (b2.parentNode) {
                                        b2.parentNode.removeChild(b2)
                                    }
                                    b2 = null;
                                    if (!b5) {
                                        b4(200, "success")
                                    }
                                }
                            };
                            e.insertBefore(b2, e.firstChild)
                        },
                        abort: function () {
                            if (b2) {
                                b2.onload(c, true)
                            }
                        }
                    }
                }
            });
            var bx = [],
                bZ = /(=)\?(?=&|$)|\?\?/;
            al.ajaxSetup({
                jsonp: "callback",
                jsonpCallback: function () {
                    var e = bx.pop() || (al.expando + "_" + (aH++));
                    this[e] = true;
                    return e
                }
            });
            al.ajaxPrefilter("json jsonp", function (e, b4, b1) {
                var b3, b5, b6, b2 = e.jsonp !== false && (bZ.test(e.url) ? "url" : typeof e.data === "string" && !(e.contentType || "").indexOf("application/x-www-form-urlencoded") && bZ.test(e.data) && "data");
                if (b2 || e.dataTypes[0] === "jsonp") {
                    b3 = e.jsonpCallback = al.isFunction(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback;
                    if (b2) {
                        e[b2] = e[b2].replace(bZ, "$1" + b3)
                    } else {
                        if (e.jsonp !== false) {
                            e.url += (N.test(e.url) ? "&" : "?") + e.jsonp + "=" + b3
                        }
                    }
                    e.converters["script json"] = function () {
                        if (!b6) {
                            al.error(b3 + " was not called")
                        }
                        return b6[0]
                    };
                    e.dataTypes[0] = "json";
                    b5 = bW[b3];
                    bW[b3] = function () {
                        b6 = arguments
                    };
                    b1.always(function () {
                        bW[b3] = b5;
                        if (e[b3]) {
                            e.jsonpCallback = b4.jsonpCallback;
                            bx.push(b3)
                        }
                        if (b6 && al.isFunction(b5)) {
                            b5(b6[0])
                        }
                        b6 = b5 = c
                    });
                    return "script"
                }
            });
            var an, K, M = 0,
                o = bW.ActiveXObject && function () {
                    var e;
                    for (e in an) {
                        an[e](c, true)
                    }
                };

            function bc() {
                try {
                    return new bW.XMLHttpRequest()
                } catch (e) {}
            }

            function bI() {
                try {
                    return new bW.ActiveXObject("Microsoft.XMLHTTP")
                } catch (e) {}
            }
            al.ajaxSettings.xhr = bW.ActiveXObject ? function () {
                return !this.isLocal && bc() || bI()
            } : bc;
            K = al.ajaxSettings.xhr();
            al.support.cors = !! K && ("withCredentials" in K);
            K = al.support.ajax = !! K;
            if (K) {
                al.ajaxTransport(function (e) {
                    if (!e.crossDomain || al.support.cors) {
                        var b1;
                        return {
                            send: function (b4, b5) {
                                var b2, b6, b3 = e.xhr();
                                if (e.username) {
                                    b3.open(e.type, e.url, e.async, e.username, e.password)
                                } else {
                                    b3.open(e.type, e.url, e.async)
                                } if (e.xhrFields) {
                                    for (b6 in e.xhrFields) {
                                        b3[b6] = e.xhrFields[b6]
                                    }
                                }
                                if (e.mimeType && b3.overrideMimeType) {
                                    b3.overrideMimeType(e.mimeType)
                                }
                                if (!e.crossDomain && !b4["X-Requested-With"]) {
                                    b4["X-Requested-With"] = "XMLHttpRequest"
                                }
                                try {
                                    for (b6 in b4) {
                                        b3.setRequestHeader(b6, b4[b6])
                                    }
                                } catch (b7) {}
                                b3.send((e.hasContent && e.data) || null);
                                b1 = function (cg, ca) {
                                    var cb, b9, b8, ce, cd;
                                    try {
                                        if (b1 && (ca || b3.readyState === 4)) {
                                            b1 = c;
                                            if (b2) {
                                                b3.onreadystatechange = al.noop;
                                                if (o) {
                                                    delete an[b2]
                                                }
                                            }
                                            if (ca) {
                                                if (b3.readyState !== 4) {
                                                    b3.abort()
                                                }
                                            } else {
                                                ce = {};
                                                cb = b3.status;
                                                cd = b3.responseXML;
                                                b8 = b3.getAllResponseHeaders();
                                                if (cd && cd.documentElement) {
                                                    ce.xml = cd
                                                }
                                                if (typeof b3.responseText === "string") {
                                                    ce.text = b3.responseText
                                                }
                                                try {
                                                    b9 = b3.statusText
                                                } catch (cf) {
                                                    b9 = ""
                                                }
                                                if (!cb && e.isLocal && !e.crossDomain) {
                                                    cb = ce.text ? 200 : 404
                                                } else {
                                                    if (cb === 1223) {
                                                        cb = 204
                                                    }
                                                }
                                            }
                                        }
                                    } catch (cc) {
                                        if (!ca) {
                                            b5(-1, cc)
                                        }
                                    }
                                    if (ce) {
                                        b5(cb, b9, ce, b8)
                                    }
                                };
                                if (!e.async) {
                                    b1()
                                } else {
                                    if (b3.readyState === 4) {
                                        setTimeout(b1)
                                    } else {
                                        b2 = ++M;
                                        if (o) {
                                            if (!an) {
                                                an = {};
                                                al(bW).unload(o)
                                            }
                                            an[b2] = b1
                                        }
                                        b3.onreadystatechange = b1
                                    }
                                }
                            },
                            abort: function () {
                                if (b1) {
                                    b1(c, true)
                                }
                            }
                        }
                    }
                })
            }
            var bJ, bk, aU = /^(?:toggle|show|hide)$/,
                ar = new RegExp("^(?:([+-])=|)(" + ak + ")([a-z%]*)$", "i"),
                aQ = /queueHooks$/,
                ab = [ay],
                bU = {
                    "*": [
                        function (b4, b7) {
                            var b2, b8, b9 = this.createTween(b4, b7),
                                b3 = ar.exec(b7),
                                b5 = b9.cur(),
                                e = +b5 || 0,
                                b1 = 1,
                                b6 = 20;
                            if (b3) {
                                b2 = +b3[2];
                                b8 = b3[3] || (al.cssNumber[b4] ? "" : "px");
                                if (b8 !== "px" && e) {
                                    e = al.css(b9.elem, b4, true) || b2 || 1;
                                    do {
                                        b1 = b1 || ".5";
                                        e = e / b1;
                                        al.style(b9.elem, b4, e + b8)
                                    } while (b1 !== (b1 = b9.cur() / b5) && b1 !== 1 && --b6)
                                }
                                b9.unit = b8;
                                b9.start = e;
                                b9.end = b3[1] ? e + (b3[1] + 1) * b2 : b2
                            }
                            return b9
                        }
                    ]
                };

            function bi() {
                setTimeout(function () {
                    bJ = c
                });
                return (bJ = al.now())
            }

            function bK(b1, e) {
                al.each(e, function (b3, b6) {
                    var b2 = (bU[b3] || []).concat(bU["*"]),
                        b4 = 0,
                        b5 = b2.length;
                    for (; b4 < b5; b4++) {
                        if (b2[b4].call(b1, b3, b6)) {
                            return
                        }
                    }
                })
            }

            function au(b1, b6, b9) {
                var ca, b4, b5 = 0,
                    e = ab.length,
                    b8 = al.Deferred().always(function () {
                        delete b3.elem
                    }),
                    b3 = function () {
                        if (b4) {
                            return false
                        }
                        var cg = bJ || bi(),
                            cd = Math.max(0, b2.startTime + b2.duration - cg),
                            cb = cd / b2.duration || 0,
                            cf = 1 - cb,
                            cc = 0,
                            ce = b2.tweens.length;
                        for (; cc < ce; cc++) {
                            b2.tweens[cc].run(cf)
                        }
                        b8.notifyWith(b1, [b2, cf, cd]);
                        if (cf < 1 && ce) {
                            return cd
                        } else {
                            b8.resolveWith(b1, [b2]);
                            return false
                        }
                    }, b2 = b8.promise({
                        elem: b1,
                        props: al.extend({}, b6),
                        opts: al.extend(true, {
                            specialEasing: {}
                        }, b9),
                        originalProperties: b6,
                        originalOptions: b9,
                        startTime: bJ || bi(),
                        duration: b9.duration,
                        tweens: [],
                        createTween: function (cd, cb) {
                            var cc = al.Tween(b1, b2.opts, cd, cb, b2.opts.specialEasing[cd] || b2.opts.easing);
                            b2.tweens.push(cc);
                            return cc
                        },
                        stop: function (cc) {
                            var cb = 0,
                                cd = cc ? b2.tweens.length : 0;
                            if (b4) {
                                return this
                            }
                            b4 = true;
                            for (; cb < cd; cb++) {
                                b2.tweens[cb].run(1)
                            }
                            if (cc) {
                                b8.resolveWith(b1, [b2, cc])
                            } else {
                                b8.rejectWith(b1, [b2, cc])
                            }
                            return this
                        }
                    }),
                    b7 = b2.props;
                aI(b7, b2.opts.specialEasing);
                for (; b5 < e; b5++) {
                    ca = ab[b5].call(b2, b1, b7, b2.opts);
                    if (ca) {
                        return ca
                    }
                }
                bK(b2, b7);
                if (al.isFunction(b2.opts.start)) {
                    b2.opts.start.call(b1, b2)
                }
                al.fx.timer(al.extend(b3, {
                    elem: b1,
                    anim: b2,
                    queue: b2.opts.queue
                }));
                return b2.progress(b2.opts.progress).done(b2.opts.done, b2.opts.complete).fail(b2.opts.fail).always(b2.opts.always)
            }

            function aI(e, b2) {
                var b6, b5, b3, b1, b4;
                for (b6 in e) {
                    b5 = al.camelCase(b6);
                    b3 = b2[b5];
                    b1 = e[b6];
                    if (al.isArray(b1)) {
                        b3 = b1[1];
                        b1 = e[b6] = b1[0]
                    }
                    if (b6 !== b5) {
                        e[b5] = b1;
                        delete e[b6]
                    }
                    b4 = al.cssHooks[b5];
                    if (b4 && "expand" in b4) {
                        b1 = b4.expand(b1);
                        delete e[b5];
                        for (b6 in b1) {
                            if (!(b6 in e)) {
                                e[b6] = b1[b6];
                                b2[b6] = b3
                            }
                        }
                    } else {
                        b2[b5] = b3
                    }
                }
            }
            al.Animation = al.extend(au, {
                tweener: function (b3, b1) {
                    if (al.isFunction(b3)) {
                        b1 = b3;
                        b3 = ["*"]
                    } else {
                        b3 = b3.split(" ")
                    }
                    var e, b2 = 0,
                        b4 = b3.length;
                    for (; b2 < b4; b2++) {
                        e = b3[b2];
                        bU[e] = bU[e] || [];
                        bU[e].unshift(b1)
                    }
                },
                prefilter: function (b1, e) {
                    if (e) {
                        ab.unshift(b1)
                    } else {
                        ab.push(b1)
                    }
                }
            });

            function ay(b3, ca, b4) {
                var b9, b1, cc, b2, cg, b6, cf, ce, cd, b5 = this,
                    e = b3.style,
                    cb = {}, b8 = [],
                    b7 = b3.nodeType && bb(b3);
                if (!b4.queue) {
                    ce = al._queueHooks(b3, "fx");
                    if (ce.unqueued == null) {
                        ce.unqueued = 0;
                        cd = ce.empty.fire;
                        ce.empty.fire = function () {
                            if (!ce.unqueued) {
                                cd()
                            }
                        }
                    }
                    ce.unqueued++;
                    b5.always(function () {
                        b5.always(function () {
                            ce.unqueued--;
                            if (!al.queue(b3, "fx").length) {
                                ce.empty.fire()
                            }
                        })
                    })
                }
                if (b3.nodeType === 1 && ("height" in ca || "width" in ca)) {
                    b4.overflow = [e.overflow, e.overflowX, e.overflowY];
                    if (al.css(b3, "display") === "inline" && al.css(b3, "float") === "none") {
                        if (!al.support.inlineBlockNeedsLayout || bf(b3.nodeName) === "inline") {
                            e.display = "inline-block"
                        } else {
                            e.zoom = 1
                        }
                    }
                }
                if (b4.overflow) {
                    e.overflow = "hidden";
                    if (!al.support.shrinkWrapBlocks) {
                        b5.done(function () {
                            e.overflow = b4.overflow[0];
                            e.overflowX = b4.overflow[1];
                            e.overflowY = b4.overflow[2]
                        })
                    }
                }
                for (b9 in ca) {
                    cc = ca[b9];
                    if (aU.exec(cc)) {
                        delete ca[b9];
                        b6 = b6 || cc === "toggle";
                        if (cc === (b7 ? "hide" : "show")) {
                            continue
                        }
                        b8.push(b9)
                    }
                }
                b2 = b8.length;
                if (b2) {
                    cg = al._data(b3, "fxshow") || al._data(b3, "fxshow", {});
                    if ("hidden" in cg) {
                        b7 = cg.hidden
                    }
                    if (b6) {
                        cg.hidden = !b7
                    }
                    if (b7) {
                        al(b3).show()
                    } else {
                        b5.done(function () {
                            al(b3).hide()
                        })
                    }
                    b5.done(function () {
                        var ch;
                        al._removeData(b3, "fxshow");
                        for (ch in cb) {
                            al.style(b3, ch, cb[ch])
                        }
                    });
                    for (b9 = 0; b9 < b2; b9++) {
                        b1 = b8[b9];
                        cf = b5.createTween(b1, b7 ? cg[b1] : 0);
                        cb[b1] = cg[b1] || al.style(b3, b1);
                        if (!(b1 in cg)) {
                            cg[b1] = cf.start;
                            if (b7) {
                                cf.end = cf.start;
                                cf.start = b1 === "width" || b1 === "height" ? 1 : 0
                            }
                        }
                    }
                }
            }

            function V(b4, b3, b1, b2, e) {
                return new V.prototype.init(b4, b3, b1, b2, e)
            }
            al.Tween = V;
            V.prototype = {
                constructor: V,
                init: function (e, b4, b2, b3, b1, b5) {
                    this.elem = e;
                    this.prop = b2;
                    this.easing = b1 || "swing";
                    this.options = b4;
                    this.start = this.now = this.cur();
                    this.end = b3;
                    this.unit = b5 || (al.cssNumber[b2] ? "" : "px")
                },
                cur: function () {
                    var e = V.propHooks[this.prop];
                    return e && e.get ? e.get(this) : V.propHooks._default.get(this)
                },
                run: function (b1) {
                    var e, b2 = V.propHooks[this.prop];
                    if (this.options.duration) {
                        this.pos = e = al.easing[this.easing](b1, this.options.duration * b1, 0, 1, this.options.duration)
                    } else {
                        this.pos = e = b1
                    }
                    this.now = (this.end - this.start) * e + this.start;
                    if (this.options.step) {
                        this.options.step.call(this.elem, this.now, this)
                    }
                    if (b2 && b2.set) {
                        b2.set(this)
                    } else {
                        V.propHooks._default.set(this)
                    }
                    return this
                }
            };
            V.prototype.init.prototype = V.prototype;
            V.propHooks = {
                _default: {
                    get: function (b1) {
                        var e;
                        if (b1.elem[b1.prop] != null && (!b1.elem.style || b1.elem.style[b1.prop] == null)) {
                            return b1.elem[b1.prop]
                        }
                        e = al.css(b1.elem, b1.prop, "auto");
                        return !e || e === "auto" ? 0 : e
                    },
                    set: function (e) {
                        if (al.fx.step[e.prop]) {
                            al.fx.step[e.prop](e)
                        } else {
                            if (e.elem.style && (e.elem.style[al.cssProps[e.prop]] != null || al.cssHooks[e.prop])) {
                                al.style(e.elem, e.prop, e.now + e.unit)
                            } else {
                                e.elem[e.prop] = e.now
                            }
                        }
                    }
                }
            };
            V.propHooks.scrollTop = V.propHooks.scrollLeft = {
                set: function (e) {
                    if (e.elem.nodeType && e.elem.parentNode) {
                        e.elem[e.prop] = e.now
                    }
                }
            };
            al.each(["toggle", "show", "hide"], function (e, b2) {
                var b1 = al.fn[b2];
                al.fn[b2] = function (b4, b3, b5) {
                    return b4 == null || typeof b4 === "boolean" ? b1.apply(this, arguments) : this.animate(aj(b2, true), b4, b3, b5)
                }
            });
            al.fn.extend({
                fadeTo: function (b2, b1, e, b3) {
                    return this.filter(bb).css("opacity", 0).show().end().animate({
                        opacity: b1
                    }, b2, e, b3)
                },
                animate: function (b3, e, b2, b1) {
                    var b6 = al.isEmptyObject(b3),
                        b4 = al.speed(e, b2, b1),
                        b5 = function () {
                            var b7 = au(this, al.extend({}, b3), b4);
                            b5.finish = function () {
                                b7.stop(true)
                            };
                            if (b6 || al._data(this, "finish")) {
                                b7.stop(true)
                            }
                        };
                    b5.finish = b5;
                    return b6 || b4.queue === false ? this.each(b5) : this.queue(b4.queue, b5)
                },
                stop: function (e, b3, b2) {
                    var b1 = function (b5) {
                        var b4 = b5.stop;
                        delete b5.stop;
                        b4(b2)
                    };
                    if (typeof e !== "string") {
                        b2 = b3;
                        b3 = e;
                        e = c
                    }
                    if (b3 && e !== false) {
                        this.queue(e || "fx", [])
                    }
                    return this.each(function () {
                        var b6 = true,
                            b7 = e != null && e + "queueHooks",
                            b5 = al.timers,
                            b4 = al._data(this);
                        if (b7) {
                            if (b4[b7] && b4[b7].stop) {
                                b1(b4[b7])
                            }
                        } else {
                            for (b7 in b4) {
                                if (b4[b7] && b4[b7].stop && aQ.test(b7)) {
                                    b1(b4[b7])
                                }
                            }
                        }
                        for (b7 = b5.length; b7--;) {
                            if (b5[b7].elem === this && (e == null || b5[b7].queue === e)) {
                                b5[b7].anim.stop(b2);
                                b6 = false;
                                b5.splice(b7, 1)
                            }
                        }
                        if (b6 || !b2) {
                            al.dequeue(this, e)
                        }
                    })
                },
                finish: function (e) {
                    if (e !== false) {
                        e = e || "fx"
                    }
                    return this.each(function () {
                        var b6, b3 = al._data(this),
                            b5 = b3[e + "queue"],
                            b4 = b3[e + "queueHooks"],
                            b2 = al.timers,
                            b1 = b5 ? b5.length : 0;
                        b3.finish = true;
                        al.queue(this, e, []);
                        if (b4 && b4.cur && b4.cur.finish) {
                            b4.cur.finish.call(this)
                        }
                        for (b6 = b2.length; b6--;) {
                            if (b2[b6].elem === this && b2[b6].queue === e) {
                                b2[b6].anim.stop(true);
                                b2.splice(b6, 1)
                            }
                        }
                        for (b6 = 0; b6 < b1; b6++) {
                            if (b5[b6] && b5[b6].finish) {
                                b5[b6].finish.call(this)
                            }
                        }
                        delete b3.finish
                    })
                }
            });

            function aj(b4, b1) {
                var e, b2 = {
                        height: b4
                    }, b3 = 0;
                b1 = b1 ? 1 : 0;
                for (; b3 < 4; b3 += 2 - b1) {
                    e = a0[b3];
                    b2["margin" + e] = b2["padding" + e] = b4
                }
                if (b1) {
                    b2.opacity = b2.width = b4
                }
                return b2
            }
            al.each({
                slideDown: aj("show"),
                slideUp: aj("hide"),
                slideToggle: aj("toggle"),
                fadeIn: {
                    opacity: "show"
                },
                fadeOut: {
                    opacity: "hide"
                },
                fadeToggle: {
                    opacity: "toggle"
                }
            }, function (e, b1) {
                al.fn[e] = function (b2, b4, b3) {
                    return this.animate(b1, b2, b4, b3)
                }
            });
            al.speed = function (e, b1, b3) {
                var b2 = e && typeof e === "object" ? al.extend({}, e) : {
                    complete: b3 || !b3 && b1 || al.isFunction(e) && e,
                    duration: e,
                    easing: b3 && b1 || b1 && !al.isFunction(b1) && b1
                };
                b2.duration = al.fx.off ? 0 : typeof b2.duration === "number" ? b2.duration : b2.duration in al.fx.speeds ? al.fx.speeds[b2.duration] : al.fx.speeds._default;
                if (b2.queue == null || b2.queue === true) {
                    b2.queue = "fx"
                }
                b2.old = b2.complete;
                b2.complete = function () {
                    if (al.isFunction(b2.old)) {
                        b2.old.call(this)
                    }
                    if (b2.queue) {
                        al.dequeue(this, b2.queue)
                    }
                };
                return b2
            };
            al.easing = {
                linear: function (e) {
                    return e
                },
                swing: function (e) {
                    return 0.5 - Math.cos(e * Math.PI) / 2
                }
            };
            al.timers = [];
            al.fx = V.prototype.init;
            al.fx.tick = function () {
                var b1, e = al.timers,
                    b2 = 0;
                bJ = al.now();
                for (; b2 < e.length; b2++) {
                    b1 = e[b2];
                    if (!b1() && e[b2] === b1) {
                        e.splice(b2--, 1)
                    }
                }
                if (!e.length) {
                    al.fx.stop()
                }
                bJ = c
            };
            al.fx.timer = function (e) {
                if (e() && al.timers.push(e)) {
                    al.fx.start()
                }
            };
            al.fx.interval = 13;
            al.fx.start = function () {
                if (!bk) {
                    bk = setInterval(al.fx.tick, al.fx.interval)
                }
            };
            al.fx.stop = function () {
                clearInterval(bk);
                bk = null
            };
            al.fx.speeds = {
                slow: 600,
                fast: 200,
                _default: 400
            };
            al.fx.step = {};
            if (al.expr && al.expr.filters) {
                al.expr.filters.animated = function (e) {
                    return al.grep(al.timers, function (b1) {
                        return e === b1.elem
                    }).length
                }
            }
            al.fn.offset = function (b4) {
                if (arguments.length) {
                    return b4 === c ? this : this.each(function (b6) {
                        al.offset.setOffset(this, b4, b6)
                    })
                }
                var b3, b2, e = {
                        top: 0,
                        left: 0
                    }, b5 = this[0],
                    b1 = b5 && b5.ownerDocument;
                if (!b1) {
                    return
                }
                b3 = b1.documentElement;
                if (!al.contains(b3, b5)) {
                    return e
                }
                if (typeof b5.getBoundingClientRect !== "undefined") {
                    e = b5.getBoundingClientRect()
                }
                b2 = bu(b1);
                return {
                    top: e.top + (b2.pageYOffset || b3.scrollTop) - (b3.clientTop || 0),
                    left: e.left + (b2.pageXOffset || b3.scrollLeft) - (b3.clientLeft || 0)
                }
            };
            al.offset = {
                setOffset: function (b2, cc, b6) {
                    var b7 = al.css(b2, "position");
                    if (b7 === "static") {
                        b2.style.position = "relative"
                    }
                    var b5 = al(b2),
                        e = b5.offset(),
                        b4 = al.css(b2, "top"),
                        ca = al.css(b2, "left"),
                        cb = (b7 === "absolute" || b7 === "fixed") && al.inArray("auto", [b4, ca]) > -1,
                        b9 = {}, b8 = {}, b1, b3;
                    if (cb) {
                        b8 = b5.position();
                        b1 = b8.top;
                        b3 = b8.left
                    } else {
                        b1 = parseFloat(b4) || 0;
                        b3 = parseFloat(ca) || 0
                    } if (al.isFunction(cc)) {
                        cc = cc.call(b2, b6, e)
                    }
                    if (cc.top != null) {
                        b9.top = (cc.top - e.top) + b1
                    }
                    if (cc.left != null) {
                        b9.left = (cc.left - e.left) + b3
                    }
                    if ("using" in cc) {
                        cc.using.call(b2, b9)
                    } else {
                        b5.css(b9)
                    }
                }
            };
            al.fn.extend({
                position: function () {
                    if (!this[0]) {
                        return
                    }
                    var e, b1, b2 = {
                            top: 0,
                            left: 0
                        }, b3 = this[0];
                    if (al.css(b3, "position") === "fixed") {
                        b1 = b3.getBoundingClientRect()
                    } else {
                        e = this.offsetParent();
                        b1 = this.offset();
                        if (!al.nodeName(e[0], "html")) {
                            b2 = e.offset()
                        }
                        b2.top += al.css(e[0], "borderTopWidth", true);
                        b2.left += al.css(e[0], "borderLeftWidth", true)
                    }
                    return {
                        top: b1.top - b2.top - al.css(b3, "marginTop", true),
                        left: b1.left - b2.left - al.css(b3, "marginLeft", true)
                    }
                },
                offsetParent: function () {
                    return this.map(function () {
                        var e = this.offsetParent || aG.documentElement;
                        while (e && (!al.nodeName(e, "html") && al.css(e, "position") === "static")) {
                            e = e.offsetParent
                        }
                        return e || aG.documentElement
                    })
                }
            });
            al.each({
                scrollLeft: "pageXOffset",
                scrollTop: "pageYOffset"
            }, function (b1, e) {
                var b2 = /Y/.test(e);
                al.fn[b1] = function (b3) {
                    return al.access(this, function (b7, b6, b5) {
                        var b4 = bu(b7);
                        if (b5 === c) {
                            return b4 ? (e in b4) ? b4[e] : b4.document.documentElement[b6] : b7[b6]
                        }
                        if (b4) {
                            b4.scrollTo(!b2 ? b5 : al(b4).scrollLeft(), b2 ? b5 : al(b4).scrollTop())
                        } else {
                            b7[b6] = b5
                        }
                    }, b1, b3, arguments.length, null)
                }
            });

            function bu(e) {
                return al.isWindow(e) ? e : e.nodeType === 9 ? e.defaultView || e.parentWindow : false
            }
            al.each({
                Height: "height",
                Width: "width"
            }, function (e, b1) {
                al.each({
                    padding: "inner" + e,
                    content: b1,
                    "": "outer" + e
                }, function (b2, b3) {
                    al.fn[b3] = function (b6, b5) {
                        var b4 = arguments.length && (b2 || typeof b6 !== "boolean"),
                            b7 = b2 || (b6 === true || b5 === true ? "margin" : "border");
                        return al.access(this, function (b9, b8, ca) {
                            var cb;
                            if (al.isWindow(b9)) {
                                return b9.document.documentElement["client" + e]
                            }
                            if (b9.nodeType === 9) {
                                cb = b9.documentElement;
                                return Math.max(b9.body["scroll" + e], cb["scroll" + e], b9.body["offset" + e], cb["offset" + e], cb["client" + e])
                            }
                            return ca === c ? al.css(b9, b8, b7) : al.style(b9, b8, ca, b7)
                        }, b1, b4 ? b6 : c, b4, null)
                    }
                })
            });
            bW.jQuery = bW.$ = al;
            if (typeof define === "function" && define.amd && define.amd.jQuery) {
                define("jquery", [], function () {
                    return al
                })
            }
        })(window);
        (function (a, c) {
            function b(r, s, p) {
                var q = k[s.type] || {};
                return r == null ? p || !s.def ? null : s.def : (r = q.floor ? ~~r : parseFloat(r), isNaN(r) ? s.def : q.mod ? (r + q.mod) % q.mod : 0 > r ? 0 : q.max < r ? q.max : r)
            }

            function d(p) {
                var q = i(),
                    r = q._rgba = [];
                return p = p.toLowerCase(), o(h, function (s, t) {
                    var u, v = t.re.exec(p),
                        w = v && t.parse(v),
                        x = t.space || "rgba";
                    if (w) {
                        return u = q[x](w), q[j[x].cache] = u[j[x].cache], r = q._rgba = u._rgba, !1
                    }
                }), r.length ? (r.join() === "0,0,0,0" && a.extend(r, n.transparent), q) : n[p]
            }

            function f(q, r, p) {
                return p = (p + 1) % 1, p * 6 < 1 ? q + (r - q) * p * 6 : p * 2 < 1 ? r : p * 3 < 2 ? q + (r - q) * (2 / 3 - p) * 6 : q
            }
            var e = "backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor",
                g = /^([\-+])=\s*(\d+\.?\d*)/,
                h = [{
                    re: /rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,
                    parse: function (p) {
                        return [p[1], p[2], p[3], p[4]]
                    }
                }, {
                    re: /rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,
                    parse: function (p) {
                        return [p[1] * 2.55, p[2] * 2.55, p[3] * 2.55, p[4]]
                    }
                }, {
                    re: /#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/,
                    parse: function (p) {
                        return [parseInt(p[1], 16), parseInt(p[2], 16), parseInt(p[3], 16)]
                    }
                }, {
                    re: /#([a-f0-9])([a-f0-9])([a-f0-9])/,
                    parse: function (p) {
                        return [parseInt(p[1] + p[1], 16), parseInt(p[2] + p[2], 16), parseInt(p[3] + p[3], 16)]
                    }
                }, {
                    re: /hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,
                    space: "hsla",
                    parse: function (p) {
                        return [p[1], p[2] / 100, p[3] / 100, p[4]]
                    }
                }],
                i = a.Color = function (p, q, r, s) {
                    return new a.Color.fn.parse(p, q, r, s)
                }, j = {
                    rgba: {
                        props: {
                            red: {
                                idx: 0,
                                type: "byte"
                            },
                            green: {
                                idx: 1,
                                type: "byte"
                            },
                            blue: {
                                idx: 2,
                                type: "byte"
                            }
                        }
                    },
                    hsla: {
                        props: {
                            hue: {
                                idx: 0,
                                type: "degrees"
                            },
                            saturation: {
                                idx: 1,
                                type: "percent"
                            },
                            lightness: {
                                idx: 2,
                                type: "percent"
                            }
                        }
                    }
                }, k = {
                    "byte": {
                        floor: !0,
                        max: 255
                    },
                    percent: {
                        max: 1
                    },
                    degrees: {
                        mod: 360,
                        floor: !0
                    }
                }, l = i.support = {}, m = a("<p>")[0],
                n, o = a.each;
            m.style.cssText = "background-color:rgba(1,1,1,.5)", l.rgba = m.style.backgroundColor.indexOf("rgba") > -1, o(j, function (p, q) {
                q.cache = "_" + p, q.props.alpha = {
                    idx: 3,
                    type: "percent",
                    def: 1
                }
            }), i.fn = a.extend(i.prototype, {
                parse: function (w, q, t, v) {
                    if (w === c) {
                        return this._rgba = [null, null, null, null], this
                    }
                    if (w.jquery || w.nodeType) {
                        w = a(w).css(q), q = c
                    }
                    var p = this,
                        s = a.type(w),
                        r = this._rgba = [],
                        u;
                    q !== c && (w = [w, q, t, v], s = "array");
                    if (s === "string") {
                        return this.parse(d(w) || n._default)
                    }
                    if (s === "array") {
                        return o(j.rgba.props, function (x, y) {
                            r[y.idx] = b(w[y.idx], y)
                        }), this
                    }
                    if (s === "object") {
                        return w instanceof i ? o(j, function (x, y) {
                            w[y.cache] && (p[y.cache] = w[y.cache].slice())
                        }) : o(j, function (z, x) {
                            var y = x.cache;
                            o(x.props, function (A, B) {
                                if (!p[y] && x.to) {
                                    if (A === "alpha" || w[A] == null) {
                                        return
                                    }
                                    p[y] = x.to(p._rgba)
                                }
                                p[y][B.idx] = b(w[A], B, !0)
                            }), p[y] && a.inArray(null, p[y].slice(0, 3)) < 0 && (p[y][3] = 1, x.from && (p._rgba = x.from(p[y])))
                        }), this
                    }
                },
                is: function (r) {
                    var s = i(r),
                        p = !0,
                        q = this;
                    return o(j, function (t, u) {
                        var v, w = s[u.cache];
                        return w && (v = q[u.cache] || u.to && u.to(q._rgba) || [], o(u.props, function (x, y) {
                            if (w[y.idx] != null) {
                                return p = w[y.idx] === v[y.idx], p
                            }
                        })), p
                    }), p
                },
                _space: function () {
                    var p = [],
                        q = this;
                    return o(j, function (r, s) {
                        q[s.cache] && p.push(r)
                    }), p.pop()
                },
                transition: function (s, u) {
                    var t = i(s),
                        v = t._space(),
                        w = j[v],
                        p = this.alpha() === 0 ? i("transparent") : this,
                        q = p[w.cache] || w.to(p._rgba),
                        r = q.slice();
                    return t = t[w.cache], o(w.props, function (x, A) {
                        var B = A.idx,
                            y = q[B],
                            z = t[B],
                            C = k[A.type] || {};
                        if (z === null) {
                            return
                        }
                        y === null ? r[B] = z : (C.mod && (z - y > C.mod / 2 ? y += C.mod : y - z > C.mod / 2 && (y -= C.mod)), r[B] = b((z - y) * u + y, A))
                    }), this[v](r)
                },
                blend: function (p) {
                    if (this._rgba[3] === 1) {
                        return this
                    }
                    var q = this._rgba.slice(),
                        r = q.pop(),
                        s = i(p)._rgba;
                    return i(a.map(q, function (t, u) {
                        return (1 - r) * s[u] + r * t
                    }))
                },
                toRgbaString: function () {
                    var p = "rgba(",
                        q = a.map(this._rgba, function (r, s) {
                            return r == null ? s > 2 ? 1 : 0 : r
                        });
                    return q[3] === 1 && (q.pop(), p = "rgb("), p + q.join() + ")"
                },
                toHslaString: function () {
                    var p = "hsla(",
                        q = a.map(this.hsla(), function (r, s) {
                            return r == null && (r = s > 2 ? 1 : 0), s && s < 3 && (r = Math.round(r * 100) + "%"), r
                        });
                    return q[3] === 1 && (q.pop(), p = "hsl("), p + q.join() + ")"
                },
                toHexString: function (p) {
                    var q = this._rgba.slice(),
                        r = q.pop();
                    return p && q.push(~~(r * 255)), "#" + a.map(q, function (s, t) {
                        return s = (s || 0).toString(16), s.length === 1 ? "0" + s : s
                    }).join("")
                },
                toString: function () {
                    return this._rgba[3] === 0 ? "transparent" : this.toRgbaString()
                }
            }), i.fn.parse.prototype = i.fn, j.hsla.to = function (s) {
                if (s[0] == null || s[1] == null || s[2] == null) {
                    return [null, null, null, s[3]]
                }
                var t = s[0] / 255,
                    u = s[1] / 255,
                    v = s[2] / 255,
                    w = s[3],
                    x = Math.max(t, u, v),
                    y = Math.min(t, u, v),
                    z = x - y,
                    A = x + y,
                    p = A * 0.5,
                    q, r;
                return y === x ? q = 0 : t === x ? q = 60 * (u - v) / z + 360 : u === x ? q = 60 * (v - t) / z + 120 : q = 60 * (t - u) / z + 240, p === 0 || p === 1 ? r = p : p <= 0.5 ? r = z / A : r = z / (2 - A), [Math.round(q) % 360, r, p, w == null ? 1 : w]
            }, j.hsla.from = function (u) {
                if (u[0] == null || u[1] == null || u[2] == null) {
                    return [null, null, null, u[3]]
                }
                var v = u[0] / 360,
                    w = u[1],
                    x = u[2],
                    y = u[3],
                    p = x <= 0.5 ? x * (1 + w) : x + w - x * w,
                    q = 2 * x - p,
                    r, s, t;
                return [Math.round(f(q, p, v + 1 / 3) * 255), Math.round(f(q, p, v) * 255), Math.round(f(q, p, v - 1 / 3) * 255), y]
            }, o(j, function (r, s) {
                var t = s.props,
                    u = s.cache,
                    p = s.to,
                    q = s.from;
                i.fn[r] = function (v) {
                    p && !this[u] && (this[u] = p(this._rgba));
                    if (v === c) {
                        return this[u].slice()
                    }
                    var x, y = a.type(v),
                        z = y === "array" || y === "object" ? v : arguments,
                        w = this[u].slice();
                    return o(t, function (C, A) {
                        var B = z[y === "object" ? C : A.idx];
                        B == null && (B = w[A.idx]), w[A.idx] = b(B, A)
                    }), q ? (x = i(q(w)), x[u] = w, x) : i(w)
                }, o(t, function (w, v) {
                    if (i.fn[w]) {
                        return
                    }
                    i.fn[w] = function (y) {
                        var z = a.type(y),
                            B = w === "alpha" ? this._hsla ? "hsla" : "rgba" : r,
                            C = this[B](),
                            x = C[v.idx],
                            A;
                        return z === "undefined" ? x : (z === "function" && (y = y.call(this, x), z = a.type(y)), y == null && v.empty ? this : (z === "string" && (A = g.exec(y), A && (y = x + parseFloat(A[2]) * (A[1] === "+" ? 1 : -1))), C[v.idx] = y, this[B](C)))
                    }
                })
            }), i.hook = function (p) {
                var q = p.split(" ");
                o(q, function (s, r) {
                    a.cssHooks[r] = {
                        set: function (y, x) {
                            var t, u, v = "";
                            if (a.type(x) !== "string" || (t = d(x))) {
                                x = i(t || x);
                                if (!l.rgba && x._rgba[3] !== 1) {
                                    u = r === "backgroundColor" ? y.parentNode : y;
                                    while ((v === "" || v === "transparent") && u && u.style) {
                                        try {
                                            v = a.css(u, "backgroundColor"), u = u.parentNode
                                        } catch (w) {}
                                    }
                                    x = x.blend(v && v !== "transparent" ? v : "_default")
                                }
                                x = x.toRgbaString()
                            }
                            try {
                                y.style[r] = x
                            } catch (x) {}
                        }
                    }, a.fx.step[r] = function (t) {
                        t.colorInit || (t.start = i(t.elem, r), t.end = i(t.end), t.colorInit = !0), a.cssHooks[r].set(t.elem, t.start.transition(t.end, t.pos))
                    }
                })
            }, i.hook(e), a.cssHooks.borderColor = {
                expand: function (p) {
                    var q = {};
                    return o(["Top", "Right", "Bottom", "Left"], function (r, s) {
                        q["border" + s + "Color"] = p
                    }), q
                }
            }, n = a.Color.names = {
                aqua: "#00ffff",
                black: "#000000",
                blue: "#0000ff",
                fuchsia: "#ff00ff",
                gray: "#808080",
                green: "#008000",
                lime: "#00ff00",
                maroon: "#800000",
                navy: "#000080",
                olive: "#808000",
                purple: "#800080",
                red: "#ff0000",
                silver: "#c0c0c0",
                teal: "#008080",
                white: "#ffffff",
                yellow: "#ffff00",
                transparent: [null, null, null, 0],
                _default: "#ffffff"
            }
        })(jQuery);
        $(document).ready(function () {
            $("body").append("<div id='divSmallBoxes'></div>");
            $("body").append("<div id='divMiniIcons'></div><div id='divbigBoxes'></div>");
            $(".OpenSideBar").pageslide({
                direction: "left"
            })
        });

        function MetroUnLoading() {
            $(".divMessageBox").fadeOut(300, function () {
                $(this).remove()
            });
            $(".LoadingBoxContainer").fadeOut(300, function () {
                $(this).remove()
            })
        }
        var ExistMsg = 0;
        var MetroMSGboxCount = 0;
        var PrevTop = 0;
        var MsgCounter = 0;
        (function (b) {
            b.MetroMessageBox = function (x, G) {
                var i, F;
                x = b.extend({
                    title: "",
                    content: "",
                    NormalButton: undefined,
                    ActiveButton: undefined,
                    buttons: undefined,
                    sound: true,
                    input: undefined,
                    placeholder: "",
                    options: undefined,
                    backgroundcolor: "#000000",
                    backgroundcontent: "#232323",
                    opacity: 0.7,
                    colortime: 1500,
                    colors: undefined,
                    changeback: true,
                    changecontent: true,
                }, x);
                var E = 0;
                E = 1;
                if (x.sound === true) {
                    if (isIE8orlower() == 0) {
                        var A = document.createElement("audio");
                        if (navigator.userAgent.match("Firefox/")) {
                            A.setAttribute("src", "plugins/metro/static/sound/messagebox.ogg")
                        } else {
                            A.setAttribute("src", "plugins/metro/static/sound/messagebox.mp3")
                        }
                        b.get();
                        A.addEventListener("load", function () {
                            A.play()
                        }, true);
                        A.pause();
                        A.play()
                    }
                }
                MetroMSGboxCount = MetroMSGboxCount + 1;
                MsgCounter += 1;
                i = "<div class='divMessageBox' id='MsgBoxBack" + MsgCounter + "'></div>";
                b("body").append(i);
                var w = b("#MsgBoxBack" + MsgCounter);
                w.css({
                    backgroundColor: x.backgroundcolor,
                    opacity: 0
                });
                w.animate({
                    opacity: x.opacity,
                }, 300);
                var z = "";
                var M = 0;
                if (x.input != undefined) {
                    M = 1;
                    x.input = x.input.toLowerCase();
                    switch (x.input) {
                    case "text":
                        z = "<input type='" + x.input + "' id='txt" + MetroMSGboxCount + "' placeholder='" + x.placeholder + "'/><br/><br/>";
                        break;
                    case "password":
                        z = "<input type='" + x.input + "' id='txt" + MetroMSGboxCount + "' placeholder='" + x.placeholder + "'/><br/><br/>";
                        break;
                    case "select":
                        if (x.options == undefined) {
                            alert("For this type of input, the options parameter is required.")
                        } else {
                            z = "<select id='txt" + MetroMSGboxCount + "'>";
                            for (var y = 0; y <= x.options.length - 1; y++) {
                                if (x.options[y] == "[") {
                                    I = ""
                                } else {
                                    if (x.options[y] == "]") {
                                        H = H + 1;
                                        I = "<option>" + I + "</option>";
                                        z += I
                                    } else {
                                        I += x.options[y]
                                    }
                                }
                            }
                            z += "</select>"
                        }
                        break;
                    default:
                        alert("That type of input is not handled yet")
                    }
                }
                F = "<div class='MessageBoxContainer' id='Msg" + MsgCounter + "'>";
                F += "<div class='MessageBoxMiddle' id='MsgMiddle" + MsgCounter + "'>";
                F += "<span class='MsgTitle'>" + x.title + "</span class='MsgTitle'>";
                F += "<p class='pText'>" + x.content + "</p>";
                F += z;
                F += "<div class='MessageBoxButtonSection'>";
                if (x.buttons == undefined) {
                    x.buttons = "[Accept]"
                }
                x.buttons = b.trim(x.buttons);
                x.buttons = x.buttons.split("");
                var I = "";
                var H = 0;
                if (x.NormalButton == undefined) {
                    x.NormalButton = "#232323"
                }
                if (x.ActiveButton == undefined) {
                    x.ActiveButton = "#ed145b"
                }
                for (var y = 0; y <= x.buttons.length - 1; y++) {
                    if (x.buttons[y] == "[") {
                        I = ""
                    } else {
                        if (x.buttons[y] == "]") {
                            H = H + 1;
                            I = "<button id='bot" + H + "-Msg" + MetroMSGboxCount + "' class='botTempo' style='background-color: " + x.NormalButton + ";'> " + I + "</button>";
                            F += I
                        } else {
                            I += x.buttons[y]
                        }
                    }
                }
                F += "</div>";
                F += "</div>";
                F += "</div>";
                b("body").append(F);
                var J = b(window).height();
                var B = b(window).width();
                var K = b("#MsgMiddle" + MsgCounter);
                var C = K.height();
                var D = (J / 2) - (C / 2);
                var L = b("#Msg" + MsgCounter);
                L.css({
                    "z-index": 100001,
                    top: D + "px",
                    opacity: 0,
                    backgroundColor: x.backgroundcontent,
                });
                L.animate({
                    opacity: 1
                }, 300);
                var a;
                var N = false;
                if (x.colors != undefined && x.colors.length > 0) {
                    if (x.changeback == true && x.changecontent == true) {
                        L.css("background-color", x.backgroundcolor);
                        w.css("background-color", x.backgroundcolor);
                        N = true
                    }
                    L.attr("colorcount", "0");
                    a = setInterval(function () {
                        var c = L.attr("colorcount");
                        if (x.changecontent == true) {
                            L.animate({
                                backgroundColor: x.colors[c].color,
                            })
                        }
                        var d = L.find(".botTempo");
                        d.animate({
                            backgroundColor: x.colors[c].color,
                        });
                        w.animate({
                            backgroundColor: x.colors[c].color,
                        });
                        x.NormalButton = x.colors[c].color;
                        if (c < x.colors.length - 1) {
                            L.attr("colorcount", ((c * 1) + 1))
                        } else {
                            L.attr("colorcount", 0)
                        }
                    }, x.colortime)
                }
                if (M == 1) {
                    b("#txt" + MetroMSGboxCount).focus()
                }
                b(".botTempo").hover(function () {
                    var c = b(this).attr("id");
                    b("#" + c).css("background-color", x.ActiveButton)
                }, function () {
                    var c = b(this).attr("id");
                    b("#" + c).css("background-color", x.NormalButton)
                });
                b(".botTempo").click(function () {
                    var f = b(this).attr("id");
                    var g = f.substr(f.indexOf("-") + 1);
                    var d = b.trim(b(this).text());
                    if (M == 1) {
                        if (typeof G == "function") {
                            var c = g.replace("Msg", "");
                            var e = b("#txt" + c).val();
                            if (G) {
                                G(d, e)
                            }
                        }
                    } else {
                        if (typeof G == "function") {
                            if (G) {
                                G(d)
                            }
                        }
                    }
                    w.animate({
                        opacity: 0,
                    }, 300, function () {
                        b(this).remove()
                    });
                    L.animate({
                        opacity: 0,
                    }, 300, function () {
                        b(this).remove()
                    })
                })
            }
        })(jQuery);
        var Point = 1;
        var MetroLoadingTimer = 0;
        var PointText = "";
        var MetroExist = false;
        var LoadingCount = 0;
        (function (b) {
            b.MetroLoading = function (z, p) {
                var y;
                z = b.extend({
                    title: undefined,
                    content: undefined,
                    img: undefined,
                    timeout: undefined,
                    special: undefined,
                    backgroundcolor: "#000000",
                    backgroundcontent: "#232323",
                    opacity: 0.7,
                    colortime: 1500,
                    colors: undefined,
                    changeback: true,
                    changecontent: true,
                }, z);
                MetroMSGboxCount = MetroMSGboxCount + 1;
                LoadingCount += 1;
                y = "<div class='divMessageBox' id='LoadingBox" + LoadingCount + "'></div>";
                b("body").append(y);
                var w = b("#LoadingBox" + LoadingCount);
                w.css({
                    "background-color": z.backgroundcolor,
                    opacity: z.opacity,
                    display: "none"
                });
                w.fadeIn(300);
                if (z.title == undefined) {
                    z.title = "Loading"
                }
                if (z.content == undefined) {
                    z.content = "Please wait."
                }
                var v = "";
                if (z.img == undefined) {
                    z.img = "";
                    v = "<br/><br/><br/><br/><br/>"
                } else {
                    z.img = "<img src='" + z.img + "' class='animated fadeIn'/>"
                }
                var r = "";
                r += "<div class='LoadingBoxContainer' id='LoadingContainer" + LoadingCount + "'>";
                r += "<div class='LoadingBoxMiddle'>";
                r += "<div align='center'>";
                r += "<br/><br/>";
                r += z.img;
                r += "<br/><br/><br/>";
                if (z.special == true) {
                    r += "<span class='MsgTitle animated fadeIn' id='lblSpecialTitle'>" + z.title + "</span>"
                } else {
                    r += "<br/><span class='MsgTitle animated fadeIn'>" + z.title + "<span id='LoadingPoints'>.</span></span>";
                    r += "<p class='pText animated fadeIn'>" + z.content + "</p>"
                }
                r += v;
                r += "</div>";
                r += "</div>";
                r += "</div>";
                b("body").append(r);
                var u = b(window).height();
                var s = b(window).width();
                var q = b("#LoadingContainer" + LoadingCount);
                var A = q.height();
                var x = (u / 2) - (A / 2);
                q.css({
                    "z-index": 100001,
                    backgroundColor: z.backgroundcontent,
                    top: x + "px",
                    opacity: 0,
                });
                q.animate({
                    opacity: 1
                }, 300);
                var a;
                var t = false;
                if (z.colors != undefined && z.colors.length > 0) {
                    if (z.changeback == true && z.changecontent == true) {
                        q.css("background-color", z.backgroundcolor);
                        w.css("background-color", z.backgroundcolor);
                        t = true
                    }
                    q.attr("colorcount", "0");
                    a = setInterval(function () {
                        var c = q.attr("colorcount");
                        if (z.changecontent == true) {
                            q.animate({
                                backgroundColor: z.colors[c].color,
                            })
                        }
                        w.animate({
                            backgroundColor: z.colors[c].color,
                        });
                        if (c < z.colors.length - 1) {
                            q.attr("colorcount", ((c * 1) + 1))
                        } else {
                            q.attr("colorcount", 0)
                        }
                    }, z.colortime)
                }
                var B;
                clearInterval(B);
                B = setInterval(function () {
                    if (b(".LoadingBoxContainer").length > 0) {} else {
                        window.clearInterval(B)
                    } if (z.special == true) {
                        if (MetroLoadingTimer == 2) {
                            b("#lblSpecialTitle").removeClass("fadeIn").addClass("fadeOut").delay(300).queue(function () {
                                b(this).text(z.content);
                                b(this).clearQueue();
                                b(this).removeClass("fadeOut");
                                b(this).addClass("fadeIn")
                            });
                            MetroLoadingTimer += 1
                        } else {
                            if (MetroLoadingTimer == 5) {
                                b("#lblSpecialTitle").removeClass("fadeIn").addClass("fadeOut").delay(300).queue(function () {
                                    b(this).text(z.title);
                                    b(this).clearQueue();
                                    b(this).removeClass("fadeOut");
                                    b(this).addClass("fadeIn")
                                });
                                MetroLoadingTimer = 0
                            } else {
                                MetroLoadingTimer += 1
                            }
                        }
                    } else {
                        if (Point == 0) {
                            PointText = ".";
                            Point += 1
                        } else {
                            if (Point == 1) {
                                PointText = "..";
                                Point += 1
                            } else {
                                if (Point == 2) {
                                    PointText = "...";
                                    Point += 1
                                } else {
                                    if (Point == 3) {
                                        PointText = "....";
                                        Point = 0
                                    }
                                }
                            }
                        }
                        b("#LoadingPoints").text(PointText)
                    }
                }, 750);
                if (z.timeout != undefined) {
                    setTimeout(function () {
                        q.fadeOut(300, function () {
                            b(this).remove()
                        });
                        w.fadeOut(300, function () {
                            b(this).remove()
                        });
                        clearInterval(B);
                        if (typeof p == "function") {
                            if (p) {
                                p()
                            }
                        }
                    }, z.timeout)
                }
            }
        })(jQuery);
        var BigBoxes = 0;
        (function (b) {
            b.bigBox = function (t, m) {
                var q, p;
                t = b.extend({
                    title: "",
                    content: "",
                    img: undefined,
                    number: undefined,
                    color: undefined,
                    sound: true,
                    timeout: undefined,
                    colortime: 1500,
                    colors: undefined
                }, t);
                if (t.sound === true) {
                    if (isIE8orlower() == 0) {
                        var n = document.createElement("audio");
                        if (navigator.userAgent.match("Firefox/")) {
                            n.setAttribute("src", "plugins/metro/static/sound/bigbox.ogg")
                        } else {
                            n.setAttribute("src", "plugins/metro/static/sound/bigbox.mp3")
                        }
                        b.get();
                        n.addEventListener("load", function () {
                            n.play()
                        }, true);
                        n.pause();
                        n.play()
                    }
                }
                BigBoxes = BigBoxes + 1;
                q = "<div id='bigBox" + BigBoxes + "' class='bigBox animated fadeIn fast'><div id='bigBoxColor" + BigBoxes + "'><img class='botClose' id='botClose" + BigBoxes + "' src='plugins/metro/static/img/close.png'>";
                q += "<span>" + t.title + "</span>";
                q += "<p>" + t.content + "</p>";
                q += "<div class='bigboxicon'>";
                if (t.img == undefined) {
                    t.img = "plugins/metro/static/img/cloud.png"
                }
                q += "<img src='" + t.img + "'>";
                q += "</div>";
                q += "<div class='bigboxnumber'>";
                if (t.number != undefined) {
                    q += t.number
                }
                q += "</div></div>";
                q += "</div>";
                b("#divbigBoxes").append(q);
                if (t.color == undefined) {
                    t.color = "#004d60"
                }
                b("#bigBox" + BigBoxes).css("background-color", t.color);
                b("#divMiniIcons").append("<div id='miniIcon" + BigBoxes + "' class='cajita animated fadeIn' style='background-color: " + t.color + ";'><img src='" + t.img + "'/></div>");
                b("#miniIcon" + BigBoxes).bind("click", function () {
                    var e = b(this).attr("id");
                    var c = e.replace("miniIcon", "bigBox");
                    var d = e.replace("miniIcon", "bigBoxColor");
                    b(".cajita").each(function (g) {
                        var h = b(this).attr("id");
                        var f = h.replace("miniIcon", "bigBox");
                        b("#" + f).css("z-index", 9998)
                    });
                    b("#" + c).css("z-index", 9999);
                    b("#" + d).removeClass("animated fadeIn").delay(1).queue(function () {
                        b(this).show();
                        b(this).addClass("animated fadeIn");
                        b(this).clearQueue()
                    })
                });
                var s = b("#botClose" + BigBoxes);
                var o = b("#bigBox" + BigBoxes);
                var a = b("#miniIcon" + BigBoxes);
                var l;
                if (t.colors != undefined && t.colors.length > 0) {
                    s.attr("colorcount", "0");
                    l = setInterval(function () {
                        var c = s.attr("colorcount");
                        s.animate({
                            backgroundColor: t.colors[c].color,
                        });
                        o.animate({
                            backgroundColor: t.colors[c].color,
                        });
                        a.animate({
                            backgroundColor: t.colors[c].color,
                        });
                        if (c < t.colors.length - 1) {
                            s.attr("colorcount", ((c * 1) + 1))
                        } else {
                            s.attr("colorcount", 0)
                        }
                    }, t.colortime)
                }
                s.bind("click", function () {
                    clearInterval(l);
                    if (typeof m == "function") {
                        if (m) {
                            m()
                        }
                    }
                    var c = b(this).attr("id");
                    var d = c.replace("botClose", "bigBox");
                    var e = c.replace("botClose", "miniIcon");
                    b("#" + d).removeClass("fadeIn fast");
                    b("#" + d).addClass("fadeOut fast").delay(300).queue(function () {
                        b(this).clearQueue();
                        b(this).remove()
                    });
                    b("#" + e).removeClass("fadeIn fast");
                    b("#" + e).addClass("fadeOut fast").delay(300).queue(function () {
                        b(this).clearQueue();
                        b(this).remove()
                    })
                });
                if (t.timeout != undefined) {
                    var r = BigBoxes;
                    setTimeout(function () {
                        clearInterval(l);
                        b("#bigBox" + r).removeClass("fadeIn fast");
                        b("#bigBox" + r).addClass("fadeOut fast").delay(300).queue(function () {
                            b(this).clearQueue();
                            b(this).remove()
                        });
                        b("#miniIcon" + r).removeClass("fadeIn fast");
                        b("#miniIcon" + r).addClass("fadeOut fast").delay(300).queue(function () {
                            b(this).clearQueue();
                            b(this).remove()
                        })
                    }, t.timeout)
                }
            }
        })(jQuery);
        var SmallBoxes = 0;
        var SmallCount = 0;
        var SmallBoxesAnchos = 0;
        (function (b) {
            b.smallBox = function (s, m) {
                var q, p;
                s = b.extend({
                    title: "",
                    content: "",
                    img: undefined,
                    icon: undefined,
                    sound: true,
                    color: undefined,
                    timeout: undefined,
                    colortime: 1500,
                    colors: undefined
                }, s);
                if (s.sound === true) {
                    if (isIE8orlower() == 0) {
                        var o = document.createElement("audio");
                        if (navigator.userAgent.match("Firefox/")) {
                            o.setAttribute("src", "plugins/metro/static/sound/smallbox.ogg")
                        } else {
                            o.setAttribute("src", "plugins/metro/static/sound/smallbox.mp3")
                        }
                        b.get();
                        o.addEventListener("load", function () {
                            o.play()
                        }, true);
                        o.pause();
                        o.play()
                    }
                }
                SmallBoxes = SmallBoxes + 1;
                q = "";
                var r = "";
                var t = "smallbox" + SmallBoxes;
                if (s.icon == undefined) {
                    r = "<div class='miniIcono'></div>"
                } else {
                    r = "<div class='miniIcono'><img class='miniPic' src='" + s.icon + "'></div>"
                } if (s.img == undefined) {
                    q = "<div id='smallbox" + SmallBoxes + "' class='SmallBox animated fadeInRight fast'><div class='textoFull'><span>" + s.title + "</span><p>" + s.content + "</p></div>" + r + "</div>"
                } else {
                    q = "<div id='smallbox" + SmallBoxes + "' class='SmallBox animated fadeInRight fast'><div class='foto'><img src='" + s.img + "'></div><div class='textoFoto'><span>" + s.title + "</span><p>" + s.content + "</p></div>" + r + "</div>"
                } if (SmallBoxes == 1) {
                    b("#divSmallBoxes").append(q);
                    SmallBoxesAnchos = b("#smallbox" + SmallBoxes).height() + 40
                } else {
                    var n = b(".SmallBox").size();
                    if (n == 0) {
                        b("#divSmallBoxes").append(q);
                        SmallBoxesAnchos = b("#smallbox" + SmallBoxes).height() + 40
                    } else {
                        b("#divSmallBoxes").append(q);
                        b("#smallbox" + SmallBoxes).css("top", SmallBoxesAnchos);
                        SmallBoxesAnchos = SmallBoxesAnchos + b("#smallbox" + SmallBoxes).height() + 20;
                        b(".SmallBox").each(function (c) {
                            if (c == 0) {
                                b(this).css("top", 20);
                                heightPrev = b(this).height() + 40;
                                SmallBoxesAnchos = b(this).height() + 40
                            } else {
                                b(this).css("top", heightPrev);
                                heightPrev = heightPrev + b(this).height() + 20;
                                SmallBoxesAnchos = SmallBoxesAnchos + b(this).height() + 20
                            }
                        })
                    }
                }
                var a = b("#smallbox" + SmallBoxes);
                if (s.color == undefined) {
                    a.css("background-color", "#004d60")
                } else {
                    a.css("background-color", s.color)
                }
                var l;
                if (s.colors != undefined && s.colors.length > 0) {
                    a.attr("colorcount", "0");
                    l = setInterval(function () {
                        var c = a.attr("colorcount");
                        a.animate({
                            backgroundColor: s.colors[c].color,
                        });
                        if (c < s.colors.length - 1) {
                            a.attr("colorcount", ((c * 1) + 1))
                        } else {
                            a.attr("colorcount", 0)
                        }
                    }, s.colortime)
                }
                if (s.timeout != undefined) {
                    setTimeout(function () {
                        clearInterval(l);
                        var c = b(this).height() + 20;
                        var d = t;
                        var e = b("#" + t).css("top");
                        if (b("#" + t + ":hover").length != 0) {
                            b("#" + t).on("mouseleave", function () {
                                SmallBoxesAnchos = SmallBoxesAnchos - c;
                                b("#" + t).remove();
                                if (typeof m == "function") {
                                    if (m) {
                                        m()
                                    }
                                }
                                var f = 1;
                                var g = 0;
                                b(".SmallBox").each(function (h) {
                                    if (h == 0) {
                                        b(this).animate({
                                            top: 20
                                        }, 300);
                                        g = b(this).height() + 40;
                                        SmallBoxesAnchos = b(this).height() + 40
                                    } else {
                                        b(this).animate({
                                            top: g
                                        }, 350);
                                        g = g + b(this).height() + 20;
                                        SmallBoxesAnchos = SmallBoxesAnchos + b(this).height() + 20
                                    }
                                })
                            })
                        } else {
                            clearInterval(l);
                            SmallBoxesAnchos = SmallBoxesAnchos - c;
                            if (typeof m == "function") {
                                if (m) {
                                    m()
                                }
                            }
                            b("#" + t).removeClass().addClass("SmallBox").animate({
                                opacity: 0
                            }, 300, function () {
                                b(this).remove();
                                var f = 1;
                                var g = 0;
                                b(".SmallBox").each(function (h) {
                                    if (h == 0) {
                                        b(this).animate({
                                            top: 20
                                        }, 300);
                                        g = b(this).height() + 40;
                                        SmallBoxesAnchos = b(this).height() + 40
                                    } else {
                                        b(this).animate({
                                            top: g
                                        });
                                        g = g + b(this).height() + 20;
                                        SmallBoxesAnchos = SmallBoxesAnchos + b(this).height() + 20
                                    }
                                })
                            })
                        }
                    }, s.timeout)
                }
                b("#smallbox" + SmallBoxes).bind("click", function () {
                    clearInterval(l);
                    if (typeof m == "function") {
                        if (m) {
                            m()
                        }
                    }
                    var c = b(this).height() + 20;
                    var d = b(this).attr("id");
                    var e = b(this).css("top");
                    SmallBoxesAnchos = SmallBoxesAnchos - c;
                    b(this).removeClass().addClass("SmallBox").animate({
                        opacity: 0
                    }, 300, function () {
                        b(this).remove();
                        var f = 1;
                        var g = 0;
                        b(".SmallBox").each(function (h) {
                            if (h == 0) {
                                b(this).animate({
                                    top: 20,
                                }, 300);
                                g = b(this).height() + 40;
                                SmallBoxesAnchos = b(this).height() + 40
                            } else {
                                b(this).animate({
                                    top: g
                                }, 350);
                                g = g + b(this).height() + 20;
                                SmallBoxesAnchos = SmallBoxesAnchos + b(this).height() + 20
                            }
                        })
                    })
                })
            }
        })(jQuery);

        function CloseSide() {
            $.pageslide.close()
        }(function (l) {
            var m, j;
            l(function () {
                m = l("body"), j = l("#pageslide");
                if (j.length == 0) {
                    j = l("<div />").attr("id", "pageslide").css("display", "none").appendTo(l("body"))
                }
                j.click(function (a) {
                    a.stopPropagation()
                });
                l(document).bind("click keyup", function (a) {
                    if (a.type == "keyup" && a.keyCode != 27) {
                        return
                    }
                    if (j.is(":visible") && !j.data("modal")) {
                        l.pageslide.close()
                    }
                })
            });
            var i = false,
                k;

            function n(b, c) {
                if (b.indexOf("#") === 0) {
                    l(b).clone(true).appendTo(j.empty()).show()
                } else {
                    if (c) {
                        var a = l("<iframe />").attr({
                            src: b,
                            frameborder: 0,
                            hspace: 0
                        }).css({
                            width: "100%",
                            height: "100%"
                        });
                        j.html(a)
                    } else {
                        j.load(b)
                    }
                    j.data("localEl", false)
                }
            }

            function h(c, d) {
                var a = j.outerWidth(true),
                    b = {}, e = {};
                if (j.is(":visible") || i) {
                    return
                }
                i = true;
                switch (c) {
                case "left":
                    j.css({
                        left: "auto",
                        right: "-" + a + "px"
                    });
                    b["margin-left"] = "-=" + a;
                    e.right = "+=" + a;
                    break;
                default:
                    j.css({
                        left: "-" + a + "px",
                        right: "auto"
                    });
                    b["margin-left"] = "+=" + a;
                    e.left = "+=" + a;
                    break
                }
                m.animate(b, d);
                j.show().animate(e, d, function () {
                    i = false
                })
            }
            l.fn.pageslide = function (b) {
                var a = this;
                a.click(function (d) {
                    var c = l(this),
                        e = l.extend({
                            href: c.attr("href")
                        }, b);
                    d.preventDefault();
                    d.stopPropagation();
                    if (j.is(":visible") && c[0] == k) {
                        l.pageslide.close()
                    } else {
                        l.pageslide(e);
                        k = c[0]
                    }
                })
            };
            l.fn.pageslide.defaults = {
                speed: 200,
                direction: "right",
                modal: false,
                iframe: true,
                href: null
            };
            l.pageslide = function (b) {
                var a = l.extend({}, l.fn.pageslide.defaults, b);
                if (j.is(":visible") && j.data("direction") != a.direction) {
                    l.pageslide.close(function () {
                        n(a.href, a.iframe);
                        h(a.direction, a.speed)
                    })
                } else {
                    n(a.href, a.iframe);
                    if (j.is(":hidden")) {
                        h(a.direction, a.speed)
                    }
                }
                j.data(a)
            };
            l.pageslide.close = function (a) {
                var b = l("#pageslide"),
                    c = b.outerWidth(true),
                    e = b.data("speed"),
                    d = {}, f = {};
                if (b.is(":hidden") || i) {
                    return
                }
                i = true;
                switch (b.data("direction")) {
                case "left":
                    d["margin-left"] = "+=" + c;
                    f.right = "-=" + c;
                    break;
                default:
                    d["margin-left"] = "-=" + c;
                    f.left = "-=" + c;
                    break
                }
                b.animate(f, e);
                m.animate(d, e, function () {
                    b.hide();
                    i = false;
                    if (typeof a != "undefined") {
                        a()
                    }
                })
            }
        })(jQuery);

        function getInternetExplorerVersion() {
            var f = -1;
            if (navigator.appName == "Microsoft Internet Explorer") {
                var e = navigator.userAgent;
                var d = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
                if (d.exec(e) != null) {
                    f = parseFloat(RegExp.$1)
                }
            }
            return f
        }

        function checkVersion() {
            var c = "You're not using Windows Internet Explorer.";
            var d = getInternetExplorerVersion();
            if (d > -1) {
                if (d >= 8) {
                    c = "You're using a recent copy of Windows Internet Explorer."
                } else {
                    c = "You should upgrade your copy of Windows Internet Explorer."
                }
            }
            alert(c)
        }

        function isIE8orlower() {
            var c = "0";
            var d = getInternetExplorerVersion();
            if (d > -1) {
                if (d >= 9) {
                    c = 0
                } else {
                    c = 1
                }
            }
            return c
        };   