_.Module.define({
	path: "adsense/widget/data_handler_async",
	requires: [],
	sub: {
		initial: function() {},
		addData: function(t) {
			$.extend(this._Storage.data, t)
		},
		getData: function() {
			return $.extend(null, this._Storage.data)
		},
		_Storage: function() {
			var t = {};
			return {
				data: t
			}
		}()
	}
});
_.Module.define({
	path: "adsense/widget/loader",
	requires: ["common/widget/messenger"],
	sub: {
		adStatus: {},
		initial: function() {
			this._initMessenger()
		},
		adBlockDet: function(e, t) {
			if("undefined" == typeof document.body) return !0;
			var a = "v1.0",
				o = document.createElement("DIV");
			t = t || "sponsorText", o.id = t, o.style.position = "absolute", o.style.left = "-999px", o.appendChild(document.createTextNode("&nbsp;")), document.body.appendChild(o), setTimeout(function() {
				if(o) {
					var t = 0 === o.clientHeight;
					try {} catch(n) {
						window.console && window.console.log && window.console.log("ADBlock detection error:", n)
					}
					e(t, a), document.body.removeChild(o)
				}
			}, 175)
		},
		_getAdLocName: function(e) {
			return [e.client_type, e.page_name, e.pos_name].join("_")
		},
		adDomMap: function() {
			var e = {},
				t = function(t, a) {
					e[t] = a
				},
				a = function(t) {
					return e[t] || $("")
				};
			return {
				add: t,
				get: a
			}
		}(),
		loadAD: function(e, t, a) {
			try {
				var o = e.adData || {},
					n = e.className || "",
					i = e.asyncHTML || "",
					r = (e.isProxy || !1, e.isAsync || !1),
					d = e.isIframe || !1,
					s = e.needStats || !1;
				$.extend(o, {
					className: n
				});
				"function" == typeof t && (a = t, t = {});
				var c = null;
				if(r) {
					if(c = $(i), !c) return;
					this._renderDOM(o, c)
				} else c = $("." + n);
				if(d) {
					var u = $.getPageData("goods_info.0.iframe_url", "", o),
						l = this._getIframeParams(o, t);
					if(!u) return;
					this._loadIframe(c, u, l), this.adDomMap.add(o.id, c)
				} else r && c.show();
				"function" == typeof a && a(c), s && this._clickStats(c, o), this._viewStats(c, o)
			} catch(_) {}
		},
		_logger: function(e, t) {
			var a = this,
				o = this._getStatsParams(t);
			a._track($.extend({}, o, {
				locate: t.pos_name,
				da_locate: t.pos_name,
				type: e,
				da_type: e
			}))
		},
		_renderDOM: function(e, t) {
			$(e.locator).length > 0 ? $(e.locator)[e.load_type](t) : this._track(e.id + "\uFF1A\u65E0\u5B9A\u4F4D\u5143\u7D20", "\u5E7F\u544A\u52A0\u8F7D\u5931\u8D25")
		},
		_getStatsParams: function(e) {
			var t = "",
				a = $.getPageData,
				o = {
					client_type: "pc_web",
					task: "tbda",
					page: a("product", t).toLowerCase(),
					fid: a("forum.forum_id", t),
					tid: a("thread.thread_id", t),
					uid: a("user.user_id", t),
					da_task: "tbda",
					da_fid: a("forum.forum_id", t),
					da_tid: a("thread.thread_id", t),
					da_uid: a("user.user_id", t),
					da_page: a("product", t),
					da_page_num: e.page_number,
					da_type_id: e.typeid,
					da_obj_id: e.id,
					da_good_id: e.goods_info[0].id,
					da_obj_name: e.name,
					da_first_name: e.first_name,
					da_second_name: e.second_name,
					da_cpid: e.cpid,
					da_abtest: e.abtest,
					da_price: e.price,
					da_verify: e.verify,
					da_plan_id: e.plan_id,
					da_ext_info: e.ext_info,
					da_client_type: e.client_type,
					da_throw_type: e.throw_type,
					da_loc_param: a("goods_info.0.loc_param", t, e),
					da_loc_index: e.loc_index
				};
			return o
		},
		_getIframeParams: function(e, t) {
			var a, o, n, i = "",
				r = $.getPageData,
				d = {
					dapage: r("product", i).toUpperCase(),
					dafid: r("forum.forum_id", i),
					datid: r("thread.thread_id", i),
					dauid: r("user.user_id", i),
					datypeid: e.typeid,
					daid: e.id,
					dacssclass: e.className,
					dagoodid: e.goods_info[0].id,
					token: e.zhixin_token,
					daname: encodeURIComponent(e.name),
					dafirstname: encodeURIComponent(e.first_name),
					dasecondname: encodeURIComponent(e.second_name),
					dacpid: e.cpid,
					daabtest: e.abtest,
					daprice: e.price,
					daverify: e.verify,
					daplanid: e.plan_id,
					daserid: e.user_id,
					dathrowtype: e.throw_type,
					title: PageData.forum.name || "",
					url: encodeURIComponent($.tb.location.getHref())
				},
				s = {},
				c = {},
				u = e.goods_info[0].url_query;
			try {
				c = $.json.decode($.tb.unescapeHTML(u));
				for(a in c)
					if(c.hasOwnProperty(a))
						if("custom" == a) {
							for(o in c[a])
								if(c[a].hasOwnProperty(o)) switch(o) {
									case "zhixintoken":
										n = c[a][o], s[n] = e.zhixintoken;
										break;
									case "forumNameGBK":
										n = c[a][o], s[n] = e.forumNameGBK
								}
						} else if("throw_thread" == a)
					for(o in c[a]) c[a].hasOwnProperty(o) && (n = c[a][o], s[n] = e[o]);
				else
					for(o in c[a]) c[a].hasOwnProperty(o) && (n = c[a][o], s[n] = encodeURIComponent(r(a + "." + o)))
			} catch(l) {}
			return $.extend(!0, d, s || {}, t || {}), d.length > 900 && (d = d.substring(0, 900)), d
		},
		_loadIframe: function(e, t, a) {
			var o = this._addParam(t, a),
				n = e.find(".iframe_wrapper"),
				i = '<iframe src="' + o + '" scrolling="no" frameborder="0"></iframe>';
			n.append(i)
		},
		_initMessenger: function() {
			var e = $.getPageData("adsense.messenger", null, window);
			if(!e) try {
				e = this.requireInstance("common/widget/messenger", ["parent", "checkStatus"]), e.registerOrigin(this._getMessengerWhitelist()), e.registerCommand({
					comforum_adsense: $.proxy(this._handleMessengerData, this)
				}), window.adsense = {
					messenger: e,
					iframeApiUrl: "//tb1.bdstatic.com/tb/_/iframe_api_7e50cb3.js"
				}
			} catch(t) {}
		},
		_getMessengerWhitelist: function() {
			try {
				var e = 0,
					t = [],
					a = PageUnit.load("dasense_messenger_whitelist"),
					o = a.length;
				for(e; o > e; e++) t.push(a[e][0]);
				return t
			} catch(n) {}
		},
		_handleMessengerData: function(e) {
			var t = this.adDomMap.get(e.id);
			if(t) {
				var a = t.find(".iframe_wrapper");
				"success" === e.status ? (e.height < a.height() && a.height(e.height), t.removeClass("hide_style").show()) : t.slideUp()
			}
		},
		_addParam: function(e, t) {
			var a = "",
				o = [],
				n = -1 === e.indexOf("?") ? "?" : "&";
			for(var i in t) t.hasOwnProperty(i) && o.push(i + "=" + t[i]);
			return a = o.join("&"), e + n + a
		},
		_clickStats: function(e, t) {
			var a = this,
				o = this._getStatsParams(t);
			t.imTimeSign && Number(t.imTimeSign) && a.ck(e.find(".j_click_stats"), t.imTimeSign), e.on("click", ".j_click_stats", function() {
				var e = $(this).data("locate") ? "_" + $(this).data("locate") : "",
					n = t.pos_name + e;
				a._track($.extend({}, o, {
					locate: n,
					da_locate: n,
					type: "click",
					da_type: "click"
				})), a._track($.extend({}, o, {
					locate: n,
					da_locate: n,
					type: "click",
					da_type: "click"
				}), "/billboard/pushlog/?"), a._track($.extend({}, o, {
					locate: n,
					da_locate: n,
					type: "click",
					da_type: "click",
					baiduid: $.cookie("BAIDUID") || ""
				}), "//als.baidu.com/dalog/logForW?")
			})
		},
		_viewStats: function(e, t) {
			var a = this,
				o = !1,
				n = null,
				i = this._getStatsParams(t),
				r = (this._getAdLocName(t), $.extend({}, i, {
					locate: t.pos_name,
					da_locate: t.pos_name,
					type: "show",
					da_type: "show"
				}), function() {
					o || (a._track($.extend({}, i, {
						locate: t.pos_name,
						da_locate: t.pos_name,
						type: "show",
						da_type: "show"
					})), a._track($.extend({}, i, {
						locate: t.pos_name,
						da_locate: t.pos_name,
						type: "show",
						da_type: "show"
					}), "/billboard/pushlog/?"), a._track($.extend({}, i, {
						locate: t.pos_name,
						da_locate: t.pos_name,
						type: "show",
						da_type: "show",
						baiduid: $.cookie("BAIDUID") || ""
					}), "//als.baidu.com/dalog/logForW?"), a.adBlockDet(function(e) {
						e && -1 !== "p0001,p0004,p0239,p0006,p0253,p0242".split(",").indexOf(t.loc_code) && a._track($.extend({}, {
							ad_id: t.id,
							ad_tpl_name: t.tpl_name,
							ad_browser_ua: window.navigator.userAgent
						}), "//als.baidu.com/smalllog/logForAdFilter?")
					}), o = !0)
				}),
				d = function() {
					var t = e.offset().top,
						a = e.offset().top + e.height(),
						o = $(window).scrollTop(),
						n = $(window).height() + o,
						i = !1;
					return(t > o && n >= t || a > o && n >= a) && (i = !0), i
				},
				s = $.getPageData("goods_info.0.statsCommand", null, t);
			s ? this.observe(s, function() {
				d() && (clearTimeout(n), n = setTimeout(r, 200))
			}) : d() ? r() : ($(window).on("scroll", function() {
				d() && (clearTimeout(n), n = setTimeout(r, 200))
			}), d() && (clearTimeout(n), n = setTimeout(r, 200)), $(window).on("scroll"))
		},
		adEmptyAls: function(e) {
			var t = this;
			$.each(e, function(e, a) {
				var o = a[0];
				if(1001 === o.goods_info[0].goods_style) {
					var n = t._getStatsParams(o);
					t._track($.extend({}, n, {
						locate: o.pos_name,
						da_locate: o.pos_name,
						type: "show",
						da_type: "show",
						baiduid: $.cookie("BAIDUID") || ""
					}), "//als.baidu.com/dalog/logForW?")
				}
			})
		},
		_track: function(e, t) {
			if(document.images) {
				var a = new Image;
				window["bd_pv_" + (new Date).getTime()] = a;
				var o = t || ("https:" === location.protocol ? "https://gsp0.baidu.com/5aAHeD3nKhI2p27j8IqW0jdnxx1xbK/tb/img/track.gif?" : "http://static.tieba.baidu.com/tb/img/track.gif?"),
					n = ["t=" + (new Date).getTime(), "r=1" + Math.random().toString().slice(2, 17)];
				for(var i in e) e.hasOwnProperty(i) && n.push(i + "=" + encodeURIComponent(e[i]));
				a.onload = a.onerror = function() {
					a = null
				}, a.src = o + n.join("&")
			}
		},
		loadCustomJS: function(e) {
			var t = null;
			e.js && (t = $.proxy(new Function("$e", "PageData", "window", e.js), {}), t(e.dom, void 0, void 0))
		},
		ck: function() {
			function e() {
				var e = b.href,
					a = b.getAttribute(x),
					o = t(e);
				return o = o || t(a)
			}

			function t(e) {
				if(!e) return !1;
				var t = k.exec(e) || D.exec(e);
				return t ? k.exec(e) ? t[1].length < 20 ? t[1] : t[1].substr(0, 20) : t[1] : !1
			}

			function a(t) {
				var a = e();
				if(a !== !1) {
					var n = r(a, t);
					o(n)
				}
			}

			function o(e) {
				var t = "&ck=" + [e, h, $, Math.round(m), Math.round(p), Math.round(_), Math.round(f), y].join("."),
					a = b.href,
					o = b.getAttribute(x);
				a && (b.href = i(a, t) + n(a)), o && b.setAttribute(x, i(o, t) + n(o))
			}

			function n(e) {
				var t = "";
				if(-1 === e.indexOf("&shh=") && -1 === e.indexOf("?shh=") && (t = "&shh=" + location.hostname), -1 === e.indexOf("&sht=") && -1 === e.indexOf("?sht=")) {
					var a = location.href.match(I);
					a && (t += "&sht=" + a[1])
				}
				return t
			}

			function i(e, a) {
				return t(e) && (-1 == e.indexOf("&ck=") ? e += a : e = e.replace(/&ck=[\d.]*/, a)), e
			}

			function r(e, t) {
				for(var a = 0, o = 0; h * t % 99 + 9 > o; o++) a += e.charCodeAt($ * o % e.length);
				return a
			}

			function d(e) {
				e = e || window.event, h++, void 0 === _ && (_ = e.clientX), void 0 === f && (f = e.clientY), g = (new Date).getTime()
			}

			function s(e, t) {
				for(e = e || window.event, b = e.target || e.srcElement; b && "A" != b.tagName;) b = b.parentNode;
				w = (new Date).getTime(), $ = 9999, m = e.clientX, p = e.clientY, y = 0 === g ? 0 : w - g, a(t)
			}

			function c(e, t) {
				v = (new Date).getTime(), $ = v - w, a(t)
			}

			function u(e, t, a) {
				var o, n, i;
				for(i in t) o = t[i], n = a[i], window.attachEvent ? e.attachEvent("on" + o, n) : e.addEventListener(o, n, !1)
			}

			function l(e) {
				return [function(e) {
					d(e)
				}, function(t) {
					s(t, e)
				}, function(t) {
					c(t, e)
				}]
			}
			var _ = void 0,
				f = void 0,
				m = 0,
				p = 0,
				h = 0,
				g = 0,
				w = 0,
				v = 0,
				y = 0,
				$ = 0,
				b = 0,
				k = /link\?url\=([^\&]+)/,
				D = /\?url\=([^\.]+)\./,
				x = "data-cklink",
				I = /[?&]tn=([^&]*)/,
				P = function(e, t) {
					void 0 === e.length && (e = [e]);
					for(var a = e.length, o = 0, n = l(t); a > o; o++) u(e[o], ["mouseover", "mousedown", "mouseup"], n)
				};
			return P
		}(),
		allPost: function() {
			var e = this,
				t = $("#j_p_postlist .j_l_post").filter(function() {
					return !/[a-z0-9]{10}/.exec(this.className)
				});
			if(t.length) {
				var a = {},
					o = [],
					n = function() {
						var e = $.cookie("BAIDUID") || "";
						if(e) {
							a = {};
							for(var t = e.substr(0, 32), o = function(e) {
									return e = (e + "").replace(/[^a-f0-9]/gi, ""), parseInt(e, 16)
								}, n = new Date, i = n.getFullYear(), r = n.getMonth(), d = n.getDate(), s = Math.round((new Date).getTime() / 1e3), c = new Date(i, 1, 1, 0, 0, 0, 0).getTime() / 1e3, u = parseInt((s - c) / 86400), l = "", _ = 0; 8 > _; _++) {
								var f = parseInt(o(t.substr(4 * _, 4)) % 10) + "";
								l += f
							}
							l = Number(l) + 48 * u;
							var m = parseInt(l % 2e3);
							if(0 > m || m >= 48) return !1;
							var p = 1;
							1 == parseInt(m % 2) && (p = 2);
							var h = parseInt(m / 2),
								g = h + 1,
								w = new Date(i, r, d, h, 0, 0, 0).getTime() / 1e3,
								v = new Date(i, r, d, g, 0, 0, 0).getTime() / 1e3;
							return v > (s > w) ? (a = {
								eid: p
							}, !0) : !1
						}
					},
					i = function(n) {
						if(n && "show" != n || $.each(t, function() {
								if("_show" === $(this).tbattr("showed")) {
									$(this).tbattr("showed", "true");
									var e = t.index($(this)) + 1,
										a = $(this).data("field").content.thread_id,
										n = $(this).data("field").content.post_id;
									o.push({
										locate: e,
										tid: a,
										pid: n
									})
								}
							}), PageData.forum) var i = PageData.forum.first_class,
							r = PageData.forum.second_class,
							d = PageData.forum.id;
						n = "click" === n ? 2 : 3;
						var s = {
							productId: 2,
							_client_type: 0,
							cuid: $.cookie("BAIDUID") || "",
							da_type: n,
							da_page: "PB",
							da_menu1: i,
							da_menu2: r,
							fid: d,
							ext_info: $.json.encode(a),
							infos: $.json.encode(o)
						};
						e._track(s, "//als.baidu.com/flog/logGFeed?")
					},
					r = function() {
						var e = function() {
								o = [];
								var e = !1;
								return $.each(t, function() {
									var t = $(this).offset().top,
										a = $(this).offset().top + $(this).height(),
										o = $(window).scrollTop(),
										n = $(window).height() + o;
									(t > o && n >= t || a > o && n >= a) && ($(this).tbattr("showed") || ($(this).tbattr("showed", "_show"), e = !0))
								}), e
							},
							a = null;
						$(window).on("scroll", function() {
							n() && e() && (clearTimeout(a), a = setTimeout(i, 200))
						}), n() && e() && (clearTimeout(a), a = setTimeout(i, 200)), $(window).on("scroll")
					};
				r()
			}
		}
	}
});
_.Module.define({
	path: "common/component/SlideShow",
	sub: {
		defaultOptions: {
			delayLoadPic: !1,
			effect: "slide",
			activeClass: "tbui_slideshow_active",
			baseZIndex: 0,
			interval: 5e3,
			slide: {
				speed: 500
			},
			fade: {
				speed: 500
			},
			triggerHandler: "click"
		},
		initial: function(t) {
			t = $.extend({}, this.defaultOptions, t);
			var i = this;
			this.options = t, this.animating = !1, this.current = 0, this.vendorPrefix = !1, this.$nav = $(t.nav), this.$navItem = this.$nav.children(), this.total = this.$navItem.size() || t.total, this.$container = $(t.target), this.$list = this.$container.children(".tbui_slideshow_list"), this.$tokens = this.$list.children(), t.width || (t.width = this.$container.width()), t.height || (t.height = this.$container.height()), this.$container.add(this.$list).css({
				width: t.width,
				height: t.height
			}), this.interval = t.interval || 5e3, this.picLoadedIndex = {}, this.$navItem.first().addClass(t.activeClass), this.$tokens.first().show(), this.showOriPic(0), "click" == t.triggerHandler ? this.$navItem.click(function() {
				var e = this;
				t.auto && i.stop(), this.delayHandler = setTimeout(function() {
					i.delayHandler = null, i.setActive($(e).index())
				}, 10)
			}).bind("mouseout", function() {
				t.auto && i.play(), this.delayHandler && clearTimeout(this.delayHandler)
			}) : "hover" == t.triggerHandler && this.$navItem.hover(function() {
				var e = this;
				t.auto && i.stop(), this.delayHandler = setTimeout(function() {
					i.delayHandler = null, i.setActive($(e).index())
				}, 200)
			}, function() {
				t.auto && i.play(), this.delayHandler && clearTimeout(this.delayHandler)
			}), this.effectHandler = this["_" + t.effect], t.auto && (this.play(), this.$list.hover(function() {
				i.stop()
			}, function() {
				i.play()
			})), t.next && $(t.next).click(function(t) {
				t.preventDefault(), t.stopPropagation(), i.next()
			}), t.prev && $(t.prev).click(function(t) {
				t.preventDefault(), t.stopPropagation(), i.prev()
			})
		},
		setActive: function(t) {
			return this.animating || t === this.current ? !1 : (this.$navItem.removeClass(this.options.activeClass).eq(t).addClass(this.options.activeClass), this.effectHandler(t), this.showOriPic(t), !0)
		},
		next: function() {
			var t = this.current + 1;
			t == this.total && (t = 0), this.setActive(t)
		},
		prev: function() {
			var t = this.current - 1; - 1 == t && (t = this.total - 1), this.setActive(t)
		},
		play: function() {
			var t = this;
			null == this.autoHandler && (this.autoHandler = setInterval(function() {
				t.next()
			}, this.options.interval))
		},
		showOriPic: function(t) {
			if(this.options.delayLoadPic && !this.picLoadedIndex["_" + t]) {
				for(var i, e = this.$tokens.eq(t).find("img"), n = e.length, s = 0; n > s; s++) {
					i = $(e[s]);
					var a = i.tbattr("orisrc");
					a && i.tbattr("src", a)
				}
				this.picLoadedIndex["_" + t] = 1
			}
		},
		stop: function() {
			clearInterval(this.autoHandler), this.autoHandler = null
		},
		_slide: function(t) {
			var i, e, n, s, a, o, r, h = this;
			this.animating = !0, i = this.current, r = t > i ? 1 : -1, e = t > i ? -this.options.width : this.options.width, s = t, this.$tokens.eq(i).siblings().css({
				display: "none",
				left: 0,
				zIndex: 0 + this.options.baseZIndex
			}), this.$tokens.eq(s).css({
				display: "block",
				left: r * this.options.width,
				zIndex: 10 + this.options.baseZIndex
			}), this.vendorPrefix ? (a = this.vendorPrefix, o = a + "Transform", n = a + "TransitionDuration", this.$list[0].style[o] = "translateX(" + e + "px)", this.$list[0].style[n] = this.options.slide.speed + "ms", this.$list.on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd", function() {
				h.$list[0].style[o] = "", h.$list[0].style[n] = "", h.$tokens.eq(s).css({
					left: 0
				}), h.$tokens.eq(i).css({
					display: "none",
					left: 0,
					zIndex: 0
				}), h.animating = !1, h.current = s, h.$list.unbind("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd"), h.trigger("animateEnd")
			})) : h.$list.stop().animate({
				left: e
			}, this.options.slide.speed, function() {
				h.$list.css({
					left: 0
				}), h.$tokens.eq(s).css({
					left: 0
				}), h.$tokens.eq(i).css({
					display: "none",
					left: 0,
					zIndex: 0
				}), h.current = s, h.animating = !1, h.trigger("animateEnd")
			})
		},
		_fade: function(t) {
			var i, e, n = this;
			this.animating = !0, i = this.current, e = t, this.$tokens.eq(e).css({
				display: "none",
				left: 0,
				zIndex: 10 + this.options.baseZIndex
			}), this.$tokens.eq(i).stop().fadeOut(this.options.fade.speed), this.$tokens.eq(e).stop().fadeIn(this.options.fade.speed, function() {
				n.$tokens.eq(e).css({
					zIndex: 0 + n.options.baseZIndex
				}), n.animating = !1, n.current = e, n.trigger("animateEnd")
			})
		},
		_getVendorPrefix: function() {
			var t, i, e, n, s;
			for(t = document.body || document.documentElement, e = t.style, n = "Transition", s = ["Moz", "Webkit", "Khtml", "O", "ms"], i = 0; i < s.length;) {
				if("string" == typeof e[s[i] + n]) return s[i];
				i++
			}
			return !1
		}
	}
});
_.Module.define({
	path: "spage/widget/CarouselAreaV3",
	requires: ["common/component/SlideShow"],
	sub: {
		_wrapper: $("#rec_left"),
		_slideShow: null,
		_slideConfig: {
			nav: "#img_page",
			target: "#carousel_wrap",
			activeClass: "active",
			interval: 5e3,
			auto: !0,
			next: "#top_progress_next",
			prev: "#top_progress_prev",
			delayLoadPic: !0,
			slide: {
				speed: 1e3
			}
		},
		adsenseStatsCommand: ["adsenseCarouselAreaShow_0", "adsenseCarouselAreaShow_1", "adsenseCarouselAreaShow_2", "adsenseCarouselAreaShow_3"],
		initial: function() {
			try {
				this._slideShow = this.requireInstance("common/component/SlideShow", this._slideConfig), this._slideShow.bind("animateEnd", $.proxy(this._sendStatsCommand, this)), this.fire(this.adsenseStatsCommand[0]), this._sendReplacementTrack(), this._bindEvent()
			} catch(e) {
				throw "undefined" != typeof alog && alog("exception.fire", "catch", {
					msg: e.message || e.description,
					path: "spage:widget/carousel_area_v3/carousel_area_v3.js",
					method: "",
					ln: 42
				}), e
			}
		},
		_sendStatsCommand: function() {
			var e = $("#carousel_wrap").find("li"),
				a = this;
			e.each(function(e, s) {
				var t = $(s);
				("block" == t.css("display") || "list-item" == t.css("display")) && a.fire(a.adsenseStatsCommand[t.index()])
			})
		},
		_sendReplacementTrack: function() {
			var e = $("#carousel_wrap").find(".carousel_promotion_replacement");
			e.each(function(e, a) {
				var s = $(a),
					t = s.data("index");
				$.stats.track("\u5BB9\u9519\u66FF\u6362", "\u9996\u9875\u8F6E\u64AD\u56FE\u7EDF\u8BA1", "", "view", {
					obj_index: t
				})
			})
		},
		isInView: function() {
			var e = $("#carousel_wrap"),
				a = e.offset().top,
				s = e.offset().top + e.height(),
				t = $("body").scrollTop(),
				n = $(window).height() + t,
				o = !1;
			return(a > t && n >= a || s > t && n >= s) && (o = !0), o
		},
		_bindEvent: function() {
			var e = this;
			$(window).on("scroll", function() {
				e.isInView() && e._sendStatsCommand()
			})
		}
	}
});
_.Module.define({
	path: "spage/widget/InterestNum",
	requires: [],
	sub: {
		_wrapper: $("#rec_right"),
		_fNumEle: $("#in_forum_num"),
		_scrollNum: {},
		initial: function(t, n) {
			try {
				this._initNum(t, n), this._rollNum(), this._bindEvent()
			} catch(i) {
				throw "undefined" != typeof alog && alog("exception.fire", "catch", {
					msg: i.message || i.description,
					path: "spage:widget/interest_num_v2/interest_num_v2.js",
					method: "",
					ln: 19
				}), i
			}
		},
		_initNum: function(t, n) {
			this._scrollNum = {
				forumNum: n,
				forumNumInit: this._getInitNum(n.length)
			}, this._renderNum(this._fNumEle, this._scrollNum.forumNumInit)
		},
		_getInitNum: function(t) {
			for(var n = "", i = 0; t > i; i++) n += "0";
			return this._formatNum(n)
		},
		_renderNum: function(t, n) {
			for(var i = "", e = n.split(""), s = e.length, u = 0; s > u; u++) i += "," == e[u] ? '<span class="num_break"><i class="num_space"></i></span>' : '<span class="num_span"><i class="num_icon"></i></span>';
			t.html(i)
		},
		_formatNum: function(t) {
			for(var n = t.length % 3, i = t.substring(0, n), e = n; e < t.length; e += 3) 0 != i.length && (i += ","), i += t.substring(e, e + 3);
			return i
		},
		_rollNum: function() {
			for(var t = this._scrollNum, n = this._formatNum(t.forumNum).split(""), i = t.forumNumInit.split(""), e = n.length; e >= 0; e--)
				if("0" == n[e] || n[e] != i[e]) {
					var s = n[e];
					0 == s && (s = 10);
					var u = 27 * s;
					this._changeNum($("#in_forum_num i").eq(e), {
						t: 0,
						pos_y: u,
						d: 100,
						b: 0
					})
				}
		},
		_changeNum: function(t, n) {
			var i = this;
			t.css("background-position", "-2px -" + (this._transition(n.t, n.pos_y, n.d, n.b) + 2) + "px"), n.t++, n.t <= n.d && setTimeout(function() {
				i._changeNum(t, n)
			}, 20)
		},
		_transition: function(t, n, i, e) {
			return(t /= i / 2) < 1 ? n / 2 * t * t * t + e : n / 2 * ((t -= 2) * t * t + 2) + e
		},
		_bindEvent: function() {
			this._wrapper.delegate(".btn_login", "click", function(t) {
				try {
					t.preventDefault(), _.Module.use("common/widget/LoginDialog", ["", "index"])
				} catch(n) {
					throw "undefined" != typeof alog && alog("exception.fire", "catch", {
						msg: n.message || n.description,
						path: "spage:widget/interest_num_v2/interest_num_v2.js",
						method: "",
						ln: 111
					}), n
				}
			})
		}
	}
});
_.Module.define({
	path: "spage/widget/tbskin_spage",
	sub: {
		initial: function(s, e) {
			try {
				var t = "//tb1.bdstatic.com/tb/cms/common/tbskin/skins/skin_" + s + ".css?v=" + e,
					i = "css_skin",
					a = $("#" + i);
				0 === a.size() ? $('<link id="' + i + '" href="' + t + '" rel="stylesheet">').appendTo("head") : a.attr("href", t), $("body").addClass("skin_" + s)
			} catch(n) {
				throw "undefined" != typeof alog && alog("exception.fire", "catch", {
					msg: n.message || n.description,
					path: "spage:widget/tbskin_spage/tbskin_spage.js",
					method: "",
					ln: 14
				}), n
			}
		}
	}
});
_.Module.define({
	path: "common/widget/payment_dialog_title",
	requires: ["common/widget/base_user_data", "user/widget/icons"],
	sub: {
		initial: function(e) {
			var s = this,
				t = {
					title: "",
					isNameShow: !1,
					isTdouShow: !1,
					isMemberShow: !1,
					onClose: $.noop
				};
			s.opts = $.extend(t, e), s.$container = e.$container, s.baseUserData = s.requireInstance("common/widget/base_user_data"), s.userIcon = s.requireInstance("user/widget/icons"), s.rendTitle(), s.bindEvents()
		},
		getMemberIcon: function() {
			var e = window.PageData.user,
				s = this.userIcon.getPreIconHtml($.getPageData("mParr_props", {}, e), e, !0);
			return s
		},
		getIsMember: function() {
			var e = this.baseUserData.getMemberIcon().icon,
				s = "";
			return("ordinary_member_icon" == $.trim(e) || "super_member_icon" == $.trim(e) || e.indexOf("vip1-18") > 0 || e.indexOf("vip2-18") > 0) && (s = " member-red "), s
		},
		getUserName: function() {
			var e = this.baseUserData.getUserName() || "";
			return {
				name: e,
				formateName: e.length > 8 ? e.slice(0, 8) + "..." : e
			}
		},
		getUserTdou: function() {
			return this.baseUserData.getUserTdou() || 0
		},
		getTreasureNum: function() {
			return this.baseUserData.getUserTreasure() || 0
		},
		rendTitle: function() {
			var e = this,
				s = e.opts,
				t = _.template('<div class="payment-dialog-title">         <h4 class="payment-dialog-title-txt"><%=title%></h4>     <div class="payment-dialog-title-user">         <%if(isNameShow){%>         <div class="user-name">             \u5E10\u53F7\uFF1A<%=memberIcon%><span title="<%=userName[\'name\']%>" class="orange-txt <%=memberClass%>"><%=userName[\'formateName\']%></span>         </div>         <%}%>         <%if(isTdouShow){%>         <div class="user-tdou">             T\u8C46\u4F59\u989D\uFF1A<i class="icon-tbean"></i><span class="orange-txt"><%=userTdouNum%></span>         </div>         <%}%>         <%if(isMemberShow){%>         <div class="user-member">         </div>         <%}%>         <%if(isTreasureShow){%>         <div class="user-treasure">             \u593A\u5B9D\u5E01\uFF1A<span class="orange-txt"><%=userTreasureNum%></span>         </div>         <%}%>     </div>     <a href="javascript:;" class="payment-dialog-title-close j-payment-close"></a> </div>')({
					title: s.title || "",
					isNameShow: s.isNameShow,
					isTdouShow: s.isTdouShow,
					isMemberShow: s.isMemberShow,
					isTreasureShow: s.isTreasureShow,
					memberClass: e.getIsMember(),
					userName: e.getUserName(),
					userTdouNum: e.getUserTdou(),
					memberIcon: e.getMemberIcon(),
					userTreasureNum: e.getTreasureNum()
				});
			e.$container && e.$container.html(t)
		},
		bindEvents: function() {
			var e = this;
			e.$container.on("click", ".j-payment-close", function() {
				e.opts.onClose()
			})
		}
	}
});
_.Module.define({
	path: "common/widget/show_dialog",
	sub: {
		initial: function(t) {
			var e = this;
			e.container = t.container, e.$container = e.container.element, e.type = t.type, e.top = parseInt(e.$container.css("top"), 10), e.height = e.$container.outerHeight()
		},
		show: function() {
			var t = this,
				e = "show";
			switch(t.type) {
				case "top-pop":
					t.topPop(e);
					break;
				case "bigger":
					t.biggerShow(e);
					break;
				default:
					t.showDefault(e)
			}
		},
		close: function() {
			var t = this,
				e = "close";
			switch(t.type) {
				case "top-pop":
					t.topPop(e);
					break;
				case "bigger":
					t.biggerShow(e);
					break;
				default:
					t.showDefault(e)
			}
		},
		getOriginSize: function() {
			var t = $(".dialogJ");
			if($.isEmptyObject(t)) return {
				width: 0,
				height: 0
			};
			var e = t.eq(t.length - 2);
			return {
				width: e.outerWidth(),
				height: e.outerHeight(),
				top: e.css("top"),
				left: e.css("left")
			}
		},
		getEndSize: function() {
			return {
				width: this.$container.outerWidth(),
				height: this.$container.outerHeight(),
				top: this.$container.css("top"),
				left: this.$container.css("left")
			}
		},
		biggerShow: function(t) {
			var e = this,
				i = e.getOriginSize(),
				o = e.getEndSize();
			"show" === t ? (e.$container.css({
				width: i.width,
				height: i.height,
				top: i.top,
				left: i.left
			}), e.container.show(), e.$container.animate({
				width: o.width,
				height: o.height,
				top: o.top,
				left: o.left
			})) : e.$container.animate({
				width: i.width,
				height: i.height,
				top: i.top,
				left: i.left
			}, function() {
				e.container.close()
			})
		},
		topPop: function(t) {
			var e = this;
			"show" === t ? (e.$container.css({
				top: -(e.top + e.height)
			}), e.container.show(), e.$container.animate({
				top: e.top
			})) : e.$container.animate({
				top: -(e.top + e.height)
			}, function() {
				e.container.close()
			})
		},
		showDefault: function(t) {
			var e = this;
			"show" === t ? e.container.show() : e.container.close()
		}
	}
});
_.Module.define({
	path: "common/widget/qianbaoPurchaseTdou",
	requires: ["common/widget/qianbaoCashierDialog", "common/widget/baseUserData", "common/widget/baseDialogUserBar"],
	sub: {
		$root: null,
		tryOptions: null,
		payOptions: null,
		initial: function() {
			var a = this;
			a.cashierDialog = a.requireInstance("common/widget/qianbaoCashierDialog"), a.baseData = a.requireInstance("common/widget/baseUserData"), a.baseDialogUserBar = this.requireInstance("common/widget/baseDialogUserBar"), a.cashierDialog.bind("event_tdou_qianbao_pay_again", a.payAgain, a)
		},
		payAgain: function() {
			var a = this;
			a._buy_icon_ajax && a._buy_icon_ajax.abort(), a._buy_icon_ajax = $.ajax({
				type: "get",
				url: "/tbmall/getPayUrl",
				data: a.tryOptions,
				cache: !1,
				dataType: "json"
			}).success(function(e) {
				if(e && 1990055 === e.error_code)
					if("undefined" == typeof passport || "undefined" == typeof passport.pop.init) {
						var o = "undefined" != typeof Env && Env.server_time ? Env.server_time : (new Date).getTime(),
							i = "https://passport";
						$.JsLoadManager.use([i + ".baidu.com/passApi/js/uni_login_wrapper.js?cdnversion=" + Math.floor(o / 6e4), i + ".baidu.com/passApi/js/wrapper.js?cdnversion=" + Math.floor(o / 6e4)], function() {
							window.realname = passport.pop.init({
								type: "accRealName",
								apiOpt: {
									product: "tb",
									staticPage: "//tieba.baidu.com/tb/static-common/html/pass/v3Jump.html"
								},
								tangram: !0,
								color: "green"
							}), window.realname.show()
						}, !0, "utf-8")
					} else window.realname.show();
				else {
					var n = e.data;
					a.payOptions.qianbao_params = n.return_url, a.payOptions.iconCount = n.iconCount, a.payOptions.iconId = n.iconId, a.showDialog(a.payOptions, a.tryOptions)
				}
			})
		},
		showDialog: function(a, e) {
			var o = this;
			o.tryOptions = e, o.payOptions = a, o.product = a.product || "tdou";
			var i = a.iconId || "suiji",
				n = a.iconCount || 1,
				s = {};
			o.getIconInfo(function(e) {
				var t = e.data;
				for(var c in t) t[c].iconId == i && (s = {
					iconId: i,
					iconCount: n,
					iconImg: t[c].picUrl,
					memeberTdou: parseInt(1.05 * n * t[c].non_member_t),
					tdou: n * t[c].non_member_t,
					name: t[c].name,
					qianbao_params: a.qianbao_params
				}, s.pay_tdou = 2 == o.baseData.getMemberLevel() ? s.memeberTdou : s.tdou);
				o.showIcon(s)
			}, o)
		},
		showIcon: function(a) {
			var e = this,
				o = a.qianbao_params || "",
				i = $.extend(a, {
					baseDialogUserBarTpl: e.baseDialogUserBar.getUserBarTemplate(),
					isSuperMember: 2 == e.baseData.getMemberIcon().level ? !0 : !1
				}),
				n = _.template('<div class="qianbao_cashier_purchase_tdou ">     <%=baseDialogUserBarTpl%>     <div class="qianbao_cashier_goods">         <div class="order_info clearfix" style="display: block;">             <label class="title order_label">\u5546\u54C1\u8BA2\u5355\uFF1A</label>             <section class="order_desc clearfix">                 \u672C\u6B21\u83B7\u53D6<i class="icon-tbean"></i><span class="tdou_num"><%=pay_tdou%></span>\uFF0C\u9700\u8981\u8D2D\u4E70\u4EE5\u4E0B\u5370\u8BB0\u6765\u5B8C\u6210             </section>         </div>         <div class="goods_list">             <label class="title goods_title">\u8D2D\u4E70\u5546\u54C1\uFF1A</label>              <div class="icon_item">                 <div class="icon_desc">                     <%if(isSuperMember) {%>                         <p>\u8D85\u7EA7\u4F1A\u5458\u83B7\u8D60<i class="icon-tbean"></i><span class="orange-txt"><%=memeberTdou%></span></p>                     <%} else {%>                         <p>\u975E\u8D85\u7EA7\u4F1A\u5458\u83B7\u8D60<i class="icon-tbean"></i><span class="orange-txt"><%=tdou%></span></p>                     <%}%>                 </div>                 <div class="icon_img_box">                     <div class="icon_info" data-id="<%=iconId%>" data-price="1000" data-amount="110000">                         <img class="icon_img" src="<%=iconImg%>">                         <p class="tdou_text"><%=name%><span id="iconCount"><%=iconCount%></span>\u4E2A<span class="expire_date">\uFF08\u6709\u6548\u671F\uFF1A<span class="day"><%=iconCount%></span>\u5929\uFF09</span></p>                     </div>                 </div>             </div>             <%if(!isSuperMember) {%>                 <p class="super-member-tips"><i class="icon-crown-super-vip"></i>\u8D34\u5427\u8D85\u7EA7\u4F1A\u5458\u52A0\u9001<span class="orange-txt">5%</span>\uFF0C\u83B7\u8D60<i class="icon-tbean"></i><span class="orange-txt"><%=memeberTdou%></span></p>             <%}%>         </div>     </div> </div> ')(i),
				s = {
					qianbao_params: o,
					product: e.product
				};
			e.cashierDialog.showDialog(s, n, function(a) {
				e.$root = a, e.bindEvents()
			})
		},
		bindEvents: function() {
			var a = this;
			a.$root.find(".qianbao_cashier_agreement a").on("click", function(a) {
				a.stopPropagation(), $.stats.track("\u4ED8\u6B3E\u5F39\u7A97\u5E95\u90E8", "\u83B7\u53D6T\u8C46\u4F1A\u5458\u670D\u52A1\u534F\u8BAE\u70B9\u51FB", PageData.page ? PageData.page : "other", "click")
			}), a.$root.find(".j_header_close").on("click", function() {
				a.cashierDialog.closeDialog()
			})
		},
		getIconInfo: function(a, e) {
			var o = this,
				i = {
					ie: "utf-8"
				};
			i.tbs = PageData.tbs, o._get_icon_ajax && o._get_icon_ajax.abort(), o._get_icon_ajax = $.ajax({
				type: "get",
				url: "/tbmall/gettdouiconinfo",
				data: i,
				cache: !1,
				dataType: "json"
			}).success(function(o) {
				a.call(e, o)
			})
		}
	}
});
_.Module.define({
	path: "common/widget/tdou_get",
	requires: ["common/widget/base_user_data", "common/widget/payment_dialog_title", "common/widget/show_dialog", "common/widget/tdou/tdou_data", "common/widget/qianbao_purchase_tdou"],
	sub: {
		tdouOptionsHeight: 71,
		payChannel: 2,
		URL: {
			getTdouIconInfo: "/tbmall/gettdouiconinfo"
		},
		iconInfoList: [],
		orderNum: 0,
		iconId: "",
		initial: function(t) {
			var e = this;
			e.opts = t, e.initDialog(), e.isPlus = window.PageData.user.id % 2 ? !0 : !1, e.baseUserData = e.requireInstance("common/widget/base_user_data"), e.dataProxy = e.requireInstance("common/widget/tdou/tdou_data", {
				scores: e.baseUserData.getUserTdou(),
				level: e.baseUserData.getMemberIcon().level
			}), e.getUserMember(), e.getTdouIconInfo(function() {
				e.renderContainer(), e.bindEvents(), e.defaultSelect(), e.clearLoading()
			})
		},
		defaultSelect: function() {
			this.$dialog.find(".tdou-options").eq(1).click(), this.$tdouSelectView.show(), this.orderNumCtrl("add")
		},
		getUserMember: function() {
			var t = this.baseUserData.getMemberIcon();
			this.isSuperMember = 2 == t.level ? !0 : !1
		},
		getTdouIconInfo: function(t) {
			var e = this,
				i = {
					tbs: window.PageData.tbs,
					ie: "utf-8"
				};
			$.get(e.URL.getTdouIconInfo, i, function(i) {
				0 == i.no ? (e.formateIconData(i.data), t && t()) : e.errorTips("\u7F51\u7EDC\u9519\u8BEF\uFF0C\u8BF7\u7A0D\u5019\u91CD\u8BD5")
			})
		},
		formateIconData: function(t) {
			this.iconInfoList = [t.tbxiaotietie, t.ff14, t.tbzhangyu, t.tbxiaoxiong]
		},
		errorTips: function(t) {
			console.log(t)
		},
		initDialog: function() {
			var t = this;
			$(".tdou-get-dialog").length && $(".tdou-get-dialog").remove(), t.dialog = new $.dialog({
				html: _.template('<div class="tdou-get-dialog-container">     <section class="tdou-get-dialog-container-loading">         <img src="<%=url%>" class="loading-img">         <p>\u52A0\u8F7D\u4E2D\uFF0C\u8BF7\u7A0D\u5019~</p>     </section> </div>')({
					url: "//tb2.bdstatic.com/tb/static-common/widget/tdou_get/images/icon-loading_f0da091.gif"
				}),
				show: !1,
				holderClassName: "tdou-get-dialog",
				escable: !1,
				showTitle: !1,
				height: 500,
				width: 620
			}), t.$dialog = t.dialog.element, t.dialogCtrl = t.requireInstance("common/widget/show_dialog", {
				container: t.dialog,
				type: "top-pop"
			}), t.dialogCtrl.show()
		},
		renderContainer: function() {
			var t = this,
				e = _.template('<section class="tdou-get-dialog-container-title"> </section> <section class="tdou-get-dialog-container-selection <%=isPlus%>">     <p class="tdou-get-dialog-container-selection-tips">\u83B7\u53D6T\u8C46\uFF0C\u9700\u8981\u8D2D\u4E70\u4EE5\u4E0B\u5370\u8BB0\u6765\u5B8C\u6210</p>     <ul class="tdou-selection-list">         <%              var top = -73;             var left = -142;             for(var i in list) {             var item = list[i];             top += 71;             left += 140;                          var tbmall_price = item[\'non_member_t\'] / 1000;             var given_tdou = item[\'non_member_t\'] * 0.05;         %>          <li class="tdou-options j-tdou-select" id="<%=item[\'iconId\']%>" data-top="<%=top%>" data-left="<%=left%>" data-icon={"num":"<%=item[\'non_member_t\']%>","price":"<%=tbmall_price%>"}>             <div class="price-div">                 <span class="price-name">                     <span class="price-title">\u4EF7\u683C:</span><span class="price"><%=tbmall_price%></span>\u5143                 </span>                              </div>             <div class="info-div">                 <div class="tdou-info">                     \u8D60\u9001<i class="icon-tbean"></i><span class="tdou-num orange-txt"><%=item[\'non_member_t\']%></span>                 </div>                 <div class="member-info">                     <i class="icon-crown-super-vip"></i>                     <p class="member-info-div j-get-member">\u8D34\u5427\u8D85\u7EA7\u4F1A\u5458\u52A0\u9001<span class="orange-txt">5%</span></p>                     <span class="member-info-div"><i class="orange-txt"><%=given_tdou%></i>T\u8C46</span>                     <p class="member-info-div-plus j-get-member">\u8D34\u5427\u8D85\u7EA7\u4F1A\u5458<span class="orange-txt">+<%=given_tdou%></span></p>                 </div>             </div>             <div class="icon-div">                 <div class="icon-img">                     <img src="<%=item[\'picUrl\']%>" />                 </div>                 <div class="icon-txt">                     <p><%=item[\'name\']%></p>                     <p>\u6709\u6548\u671F\uFF1A<%=item[\'duration\']%>\u5929</p>                 </div>             </div>         </li>         <%}%>         <li class="tdou-options-active">             <i class="icon-select"></i>         </li>     </ul> </section> <section class="tdou-get-dialog-container-order">     <div>         <span class="payment-txt">\u8D2D\u4E70\u6570\u91CF\uFF1A</span>         <div class="tdou-num-ctrl">             <a href="javascript:;" class="tdou-num min j-change-num" data-type="min">-</a><input class="tdou-num-input j-input-num" data-type="input" type="text" maxlength="6"/><a href="javascript:;" class="tdou-num add j-change-num" data-type="add">+</a>         </div>         <div class="cash-num-view">             \u9700\u652F\u4ED8\uFF1A<span class="cash-num-view-txt orange-txt">0</span>\u5143         </div>         <div class="tdou-num-view">             \u83B7\u8D60\uFF1A<span class="tdou-num-view-txt orange-txt">0</span>T\u8C46         </div>     </div> </section> <section class="tdou-get-dialog-container-btn">     <a href="javascript:;" class="payment-btn j-get-tdou">\u7ACB\u5373\u652F\u4ED8</a> </section> <section class="tdou-get-dialog-container-bottom">     \u63D0\u9192\uFF1A\u60A8\u5728PC\u4EE5\u53CA\u5B89\u5353\u624B\u673A\u4E0A\u83B7\u53D6\u7684T\u8C46\u4E0EIOS\u624B\u673A\u4E0A\u83B7\u53D6\u7684T\u8C46\u4E0D\u540C\u7528 </section>')({
					list: t.iconInfoList,
					isPlus: t.isPlus ? "dialog-plus" : ""
				});
			t.$dialog.find(".tdou-get-dialog-container").append(e), t.$dialogTitle = t.$dialog.find(".tdou-get-dialog-container-title"), t.$tdouSelectView = t.$dialog.find(".tdou-options-active"), t.$cashView = t.$dialog.find(".cash-num-view-txt"), t.$tdouNumView = t.$dialog.find(".tdou-num-view-txt"), t.$orderInput = t.$dialog.find(".tdou-num-input"), t.$minOrderBtn = t.$dialog.find(".j-change-num").eq(0), t.$loadingView = t.$dialog.find(".tdou-get-dialog-container-loading"), t.$getTouBtn = t.$dialog.find(".j-get-tdou"), t.addTitle(), t.trackCtrl("view")
		},
		addTitle: function() {
			var t = this,
				e = {
					$container: t.$dialogTitle,
					title: "\u83B7\u53D6T\u8C46",
					isNameShow: !0,
					isTdouShow: !0,
					onClose: function() {
						t.dialogCtrl.close()
					}
				};
			t.requireInstance("common/widget/payment_dialog_title", e)
		},
		changeTdouOptions: function(t) {
			var e = t.tbattr("id"),
				i = Number(t.data("top")),
				o = Number(t.data("left")),
				a = this.$tdouSelectView;
			this.iconData = t.data("icon"), this.isPlus ? a.animate({
				left: o
			}, "fast", "swing") : a.animate({
				top: i
			}, "fast", "swing"), this.iconId = e, this.orderViewUpdate()
		},
		orderNumCtrl: function(t) {
			var e = this,
				i = e.orderNum;
			"add" === t ? e.$orderInput.val(++i) : e.$orderInput.val(--i), 1 == i ? e.$minOrderBtn.addClass("disabled") : e.$minOrderBtn.removeClass("disabled"), e.orderNum = i, e.orderViewUpdate()
		},
		orderInputNumCtrl: function(t) {
			var e = this,
				i = t.val(),
				o = parseInt(i, 10) || 0;
			"" === i ? (e.orderNum = 0, e.$minOrderBtn.addClass("disabled")) : 0 === o ? (e.orderNum = 0, e.$minOrderBtn.addClass("disabled"), e.$orderInput.val("")) : (1 !== o && e.$minOrderBtn.removeClass("disabled"), i != o ? (e.orderNum = o, e.$orderInput.val(o)) : e.orderNum = o), e.orderViewUpdate()
		},
		orderViewUpdate: function() {
			var t = this;
			if(t.orderNum && t.iconId) {
				var e = t.iconData,
					i = t.orderNum,
					o = Number(e.price) * i,
					a = Number(e.num) * i;
				t.isSuperMember && (a += .05 * a), t.$cashView.html(o), t.$tdouNumView.html(a)
			} else t.$cashView.html(0), t.$tdouNumView.html(0)
		},
		getTdou: function() {
			var t = this,
				e = $.tb.location.getHref();
			t.setLoading();
			var i = t.opts && t.opts.consumption_path || 0;
			t.dataProxy.payIcon(t.iconId, t.orderNum, t.buyIcon, t, e, i, t.payChannel)
		},
		buyIcon: function(t) {
			var e = this;
			if(t && 0 == t.no) {
				e.cashier = e.requireInstance("common/widget/qianbao_purchase_tdou");
				var i = t.data,
					o = e.$tdouNumView.html(),
					a = e.opts && e.opts.consumption_path || 0,
					n = $.extend({
						product: "tdou",
						consumption_path: a,
						goods_cost_tdou: o,
						pay_type: 6,
						pay_channel: e.payChannel
					}, {
						qianbao_params: i.return_url,
						iconCount: i.iconCount,
						iconId: i.iconId
					}),
					s = {
						ie: "utf-8",
						tbs: window.PageData.tbs,
						terminal: "pc",
						pay_type: 6,
						iconId: i.iconId,
						pageUrl: i.return_url || "",
						margin: o,
						goodsCost: o,
						fr: a || 0,
						channel: e.payChannel
					};
				e.cashier.showDialog(n, s), setTimeout(function() {
					e.clearLoading()
				}, 1e3)
			} else if(t && 11e4 === t.no) e.requireInstance("common/widget/login_dialog");
			else if(t && 1990055 === t.error_code)
				if("undefined" == typeof passport || "undefined" == typeof passport.pop.init) {
					var d = "undefined" != typeof Env && Env.server_time ? Env.server_time : (new Date).getTime(),
						r = "https://passport";
					$.JsLoadManager.use([r + ".baidu.com/passApi/js/uni_login_wrapper.js?cdnversion=" + Math.floor(d / 6e4), r + ".baidu.com/passApi/js/wrapper.js?cdnversion=" + Math.floor(d / 6e4)], function() {
						window.realname = passport.pop.init({
							type: "accRealName",
							apiOpt: {
								product: "tb",
								staticPage: "//tieba.baidu.com/tb/static-common/html/pass/v3Jump.html"
							},
							tangram: !0,
							color: "green"
						}), window.realname.show()
					}, !0, "utf-8")
				} else window.realname.show();
			else setTimeout(function() {
				e.clearLoading()
			}, 1e3)
		},
		updateTdou: function(t) {
			console.log(t)
		},
		clearLoading: function() {
			var t = this;
			t.$loadingView.hide(), t.$getTouBtn.removeClass("loading")
		},
		setLoading: function() {
			this.$loadingView.show(), this.$getTouBtn.addClass("loading")
		},
		bindEvents: function() {
			var t = this;
			t.$dialog.on("click", ".j-tdou-select", function(e) {
				var i = $(e.currentTarget);
				t.changeTdouOptions(i), t.trackCtrl("choose")
			}).on("click", ".j-change-num", function(e) {
				var i = $(e.target),
					o = i.data("type");
				t.orderNumCtrl(o)
			}).on("input", ".j-input-num", function(e) {
				var i = $(e.target);
				t.orderInputNumCtrl(i)
			}).on("click", ".j-get-tdou", function(e) {
				var i = $(e.target);
				i.hasClass("loading") || (t.getTdou(), t.dialogCtrl.close(), t.trackCtrl("pay"))
			}).on("click", ".j-get-member", function() {
				$.stats.track("T\u8C46\u94B1\u5305", "\u4F1A\u5458\u5065\u5EB7\u7EDF\u8BA1", "", "click", {
					obj_name: "\u83B7\u53D6T\u8C46\u70B9\u51FB\u8D34\u5427\u8D85\u7EA7\u4F1A\u5458"
				})
			})
		},
		trackCtrl: function(t) {
			var e = this,
				i = e.isPlus ? "new" : "old";
			switch(t) {
				case "view":
					$.stats.track("show-" + i, "TdouCashier", "", "view", {
						tdouViewType: i
					});
					break;
				case "choose":
					$.stats.track("choose-" + i, "TdouCashier", "", "click", {
						tdouViewType: i
					});
					break;
				case "pay":
					$.stats.track("buy-" + i, "TdouCashier", "", "click", {
						tdouViewType: i
					})
			}
		}
	}
});
_.Module.define({
	requires: ["common/widget/tdou_get"],
	path: "common/widget/tchargeDialog",
	sub: {
		initial: function(e) {
			var t = this;
			t.requireInstanceAsync("common/widget/Tdou", [], function(c) {
				e && e.chargeType && "platform" == e.chargeType ? c.factory("payment", e) : (e && (t.consumption_path = e.consumption_path, t.desc = e.desc, t.current_need_tdou = e.current_need_tdou, t.is_direct_cashier = e.is_direct_cashier), e && t.is_direct_cashier ? c.factory("auto_direct", e) : t.requireInstance("common/widget/tdou_get", e))
			})
		}
	}
});
_.Module.define({
	path: "adsense/widget/tool_async",
	requires: [],
	sub: {
		initial: function() {
			this.dataHandler = this.requireInstance("adsense/widget/data_handler_async", [])
		},
		genMd5: function(e) {
			var t = "AS" + this.genRandChar(),
				a = (new Date).getTime();
			return t + e.substr(-3) + ("" + a).substr(-6)
		},
		genQaClassName: function() {
			return "1" == $.tb.location.getSearchValue("__qa_page_diff") ? "__qa_page_diff" : ""
		},
		genRandChar: function() {
			var e = "abcdefghijklmnopqrstuvwxyz";
			return e[this._randomInt(0, e.length - 1)]
		},
		_randomInt: function(e, t) {
			return e -= 1, Math.ceil(e + Math.random() * (t - e))
		},
		getStatsUrl: function(e, t) {
			var a;
			return a = t.click_url_params ? this.getUrl({
				url: "/link",
				tbjump: t.click_url_params,
				extra: {
					obj_id: t.id
				}
			}) : e
		},
		getUrl: function(e) {
			var t = $.getPageData("forum"),
				a = $.getPageData("user"),
				r = $.getPageData("context.thread_info", {}),
				n = e.url ? e.url : "",
				i = $.getPageData("product", ""),
				u = ["client_type=pc_web", "tbjump=" + (e.tbjump ? e.tbjump : ""), "task=" + (e.task ? e.task : ""), "locate=" + (e.locate ? e.locate : ""), "page=" + (e.page ? e.page : "" != i ? i : "MODULE_NAME"), "type=click", "fid=" + (t.forum_id ? t.forum_id : ""), "fname=" + (t.forum_name ? t.forum_name : ""), "uid=" + (a.user_id ? a.user_id : ""), "uname=" + (a.user_name ? a.user_name : ""), "is_new_user=" + (a.is_new_user ? a.is_new_user : ""), "tid=" + (r.thread_id ? r.thread_id : ""), "_t=" + (new Date).getTime()];
			return e.extra && $.each(e.extra, function(e, t) {
				u.push(e + "=" + t)
			}), n + "?" + u.join("&")
		},
		getDirInfo: function() {
			var e = this.dataHandler.getData();
			return {
				forum_dir: $.getPageData("forum.first_class", ""),
				forum_second_dir: $.getPageData("forum.second_class", ""),
				forum_vdir: $.getPageData("forum_vdir", "", e)
			}
		},
		getSpecialInfo: function(e) {
			for(var t = this.dataHandler.getData(), a = {}, r = 0, n = e.length; n > r; r++) a[e[r]] = t[e[r]];
			return a
		},
		preProcess: function(e, t, a) {
			return "undefined" == typeof a && (a = 0), t.loc_index = a + 1, t
		}
	}
});
_.Module.define({
	path: "adsense/widget/loader_async",
	requires: ["adsense/widget/tool_async"],
	sub: {
		initial: function(e) {
			var t = this.requireInstance("adsense/widget/tool_async"),
				a = "/dasense/" + e.url,
				n = e.extraData || {},
				s = e.specialDataName || [];
			this.tool = t, a = t.getUrl({
				url: a
			}), this.dataname = e.dataname || null, this.dfd = $.Deferred(), this._getData(a, n, s)
		},
		_getData: function(e, t, a) {
			var n = this,
				s = this.tool.getDirInfo(),
				i = this.tool.getSpecialInfo(a);
			t = $.extend(null, t, s, i, {
				ie: "utf-8"
			}), $.getJSON(e, t, function(e) {
				if(0 != e.errno || !n.dataname) return !1;
				var t = $.getPageData("data.adsense", {}, e);
				n.data = t[n.dataname] || [], n._loadTPL()
			})
		},
		_loadTPL: function() {
			for(var e = !0, t = null, a = 0, n = this.data.length; n > a; a++) {
				var s = this.data[a];
				s = this.tool.preProcess(this.dataname, s, a), s.first_screen && "0" != s.first_screen || !e || (t = -1 == (s.tpl_name + "").indexOf("ASYNC_") ? "tpl_async_" + s.tpl_name : "tpl_" + s.tpl_name, t = "adsense/widget/" + t, this.requireInstanceAsync(t, [{
					adData: s,
					needStats: !0
				}]))
			}
			this._resolve()
		},
		_resolve: function() {
			var e = null;
			e = this.data.length ? {
				no: 0,
				error: ""
			} : {
				no: 1,
				error: "has no data"
			}, this.dfd.resolve(e)
		}
	}
});
_.Module.define({
	requires: ["adsense/widget/loader_async"],
	path: "ucenter/widget/LikeTip",
	sub: {
		initial: function(e, s, i, t) {
			var r = this;
			if(this.userForumList = t || "", i && i.like_no && i.like_no >= 1) {
				var a = $.dialog.open(['<div id="do_like_back_wrapper">', '<img class="like_back_img" src="//tb2.bdstatic.com/tb/static-ucenter/widget/like_tip/img/like_back_c3abf90.jpg">', this.like_forum_tmp, "</div>"].join(""), {
					width: 478,
					acceptValue: "\u77E5\u9053\u4E86"
				});
				$(a.element[0]).find(".dialogJcontent").css("padding-bottom", "0px"), $(a.element[0]).find(".dialogJanswers").css("padding-top", "0px"), a.bind("onaccept", function() {
					r.reloadAndGotop()
				}).bind("onclose", function() {
					r._postDaLikeTrack("\u5173\u95ED"), r.reloadAndGotop()
				})
			} else {
				var n = this.getTipContent(e, s, i),
					l = {
						title: "\u6210\u529F\u63D0\u793A",
						width: 478,
						modal: !e
					};
				this.isSuperMember() && (l.width = 535);
				var a = $.dialog.open(n, l);
				e && $(a.element[0]).css("padding", "2px"), $(a.element[0]).find(".dialogJcontent").tbattr("id", "balv_first_like_dialog"), $(a.element[0]).find(".userlike_tip_span a").click(function() {
					Stats.sendRequest("fr=tb0_forum&st_mod=frs&st_type=entryimallinpop")
				}), $(a.element[0]).on("click", ".userlike_supermember_btn", function() {
					window.open("/tbmall/mall/forumMember"), r.reloadAndGotop()
				}), a.bind("onclose", function() {
					r._postDaLikeTrack("\u5173\u95ED"), r.reloadAndGotop()
				})
			}
			this.initLikeForum(a)
		},
		like_forum_tmp: ['<div id="content-recommend-like-forum">', '<p class="like-btn-wrapper">\u4F60\u53EF\u80FD\u8FD8\u60F3\u5173\u6CE8<button class="btn-default btn-small pull-right a-like-all-btn">\u4E00\u952E\u5173\u6CE8</button></p>', '<div class="adsense-content-recommend-forum"></div>', "</div>"].join(""),
		initLikeForum: function(e) {
			var s = 100,
				i = this.requireInstance("adsense/widget/loader_async", [{
					url: "recommend",
					dataname: "PC_RECOMM_BOTTOM",
					extraData: {
						user_forum_list: this.userForumList
					}
				}]),
				t = $("#content-recommend-like-forum"),
				r = this;
			t.on("click", ".a-like-all-btn", function() {
				r._postDaLikeTrack("\u4E00\u952E\u5173\u6CE8"), t.find(".a-like-btn.btn-sub:lt(4)").trigger("click")
			}), i.dfd.done(function(i) {
				0 == i.no && t.html().length && (t.show(), e.setPosition(null, s))
			})
		},
		_postDaLikeTrack: function(e, s, i, t) {
			"undefined" == typeof e && (e = ""), "undefined" == typeof t && (t = "click"), i = i || {}, s && (i = $.extend({
				obj_name: s.game_name,
				obj_game_id: s.game_id
			}, i)), $.stats.track(e, "\u5206\u53D1\u5173\u6CE8\u5427\u63A8\u8350", "", t, i)
		},
		getTipContent: function(e, s, i) {
			var t = PageData,
				r = t.user.level_id ? t.user : t.user.balv,
				a = "<span>";
			e && (a += e + "\uFF0C"), a += "\u606D\u559C\u4F60\u6210\u4E3A\u672C\u5427\u7B2C</span>", a += "<span class='tip_font_orange'>" + i.index + "</span>", a += "<span>\u4F4D\u4F1A\u5458</span>";
			var n = "";
			n += '<div class="userlike_tip_join" id="userlike_tip_join">', n += '<div class="userlike_tip_info" id="userlike_tip_info">' + a + "</div>", e ? n += '<div class="user_rights_msg"><span class="user_rights_msg_gray">\u83B7\u5F97\u5934\u8854&nbsp;</span><img class="user_rights_msg_img" src="/tb/static-frs/img/balv/lv_join.png">&nbsp;' + r.level_name + '<span class="user_rights_msg_gray">&nbsp;\u5347\u7EA7\u4EAB\u7279\u6743\uFF0C<span><a rel="noreferrer" class="user_rights_msg_link" target="_blank" href="/f/like/level?kw=' + t.forum.name_url + '">\u67E5\u770B\u4F1A\u5458\u6743\u5229</a></div>' : 1 == r.level_id ? n += '<div class="user_rights_msg">\u83B7\u5F97\u5934\u8854&nbsp;<img class="user_rights_msg_img" src="/tb/static-frs/img/balv/lv_join.png">&nbsp;' + r.level_name + '\uFF0C\u5347\u7EA7\u4EAB\u7279\u6743\uFF0C<a rel="noreferrer" target="_blank" href="/f/like/level?kw=' + t.forum.name_url + '">\u67E5\u770B\u5347\u7EA7\u79D8\u7C4D</a></div>' : (n += '<div class="user_rights_msg">\u6839\u636E\u4F60\u5728\u672C\u5427\u7684\u6D3B\u8DC3\u8868\u73B0\uFF0C\u76F4\u63A5\u6388\u4E88<img src="//tb2.bdstatic.com/tb/static-member/img/badges/' + r.level_id + '.png">&nbsp;' + r.level_name + "\uFF0C\u7ED9\u529B\uFF01</div>", n += '<div class="userlike_tip_span">\u672C\u5427\u767E\u5B9D\u7BB1\u5BF9\u4F60\u5F00\u653E\u4E86\uFF0C<a rel="noreferrer" target="_blank" href="/imall/mall?kw=' + t.forum.name_url + '">\u53BB\u767E\u5B9D\u7BB1\u770B\u770B\u6709\u54EA\u4E9B\u7279\u6743\u548C\u5B9D\u8D1D</a></div>'), this.isSuperMember() && (n += this.getSuperMemberHtml()), n += this.like_forum_tmp, n += '<div class="lvlup_tip_btnzone">';
			var l = "";
			return this.isSuperMember() && (n += '<input class="userlike_supermember_btn userlike_sm_btn_style" type="button" value="\u8BE6\u7EC6\u4E86\u89E3\u7279\u6743"/>', l = "userlike_sm_btn_style"), e && (n += '<a rel="noreferrer" class="userlike_tip_cancel" target="_blank" href="/home/forum?id=' + t.user.portrait + "&fr=" + t.product + '">\u5982\u4F55\u53D6\u6D88\u4F1A\u5458</a>'), n += "</div></div>"
		},
		reloadAndGotop: function() {
			$.tb.location.setHref($.tb.location.getHref().split("#")[0])
		},
		getSuperMemberHtml: function() {
			var e = [],
				s = PageData.user ? PageData.user.Parr_props ? PageData.user.Parr_props.level ? PageData.user.Parr_props.level : {} : {} : {},
				i = PageData.forum.name || PageData.forum.forum_name;
			return e.push('<div class="userlike_supermember">'), e.push('<div class="userlike_sm_up clearfix">'), e.push('<div class="userlike_sm_up_gift"></div>'), e.push('<div class="userlike_sm_up_info">'), e.push('<h3>\u5C0A\u8D35\u7684<span class="userlike_sm_up_icon">\u8D34\u5427\u8D85\u7EA7\u4F1A\u5458</span></h3>'), e.push("<h2>\u60A8\u5DF2\u6210\u529F\u83B7\u5F97<b>\u3010" + i + "\u5427\u7279\u6743\u5305\u3011</b></h2>"), e.push("<p>\u6709\u6548\u671F\u81F3" + this.getFormatZhTime(1e3 * s.end_time) + "</p>"), e.push("</div>"), e.push("</div>"), e.push('<div class="userlike_sm_down clearfix">'), e.push('<div class="userlike_sm_down_item">'), e.push('<div class="userlike_sm_down_title">\u7EA2\u8272\u6807\u9898</div>'), e.push('<div class="userlike_sm_down_pic userlike_sm_down_pic_1"></div>'), e.push("</div>"), e.push('<div class="userlike_sm_down_item">'), e.push('<div class="userlike_sm_down_title">\u7ECF\u9A8C\u52A0\u901F</div>'), e.push('<div class="userlike_sm_down_pic userlike_sm_down_pic_2"></div>'), e.push("</div>"), e.push("</div>"), e.push("</div>"), e.join("")
		},
		isSuperMember: function() {
			var e = PageUnit.load("like_tip_svip_black_list");
			if(e) return !1;
			var s = PageData.user ? PageData.user.Parr_props ? PageData.user.Parr_props.level ? PageData.user.Parr_props.level : {} : {} : {};
			return 1e3 * s.end_time > 1 * new Date && 2 === s.props_id && !PageData.forum.is_star
		},
		getFormatZhTime: function(e) {
			return "number" != typeof e ? "" : (e = new Date(e), [e.getFullYear() + "\u5E74", parseInt(e.getMonth() + 1) + "\u6708", e.getDate() + "\u65E5"].join(""))
		}
	}
});
_.Module.define({
	requires: ["user/widget/userApi"],
	path: "common/widget/MemberApi",
	sub: {
		initial: function() {},
		getMemberNameClass: function(e, r) {
			var i = "";
			if(Env.server_time > 13962816e5 && Env.server_time < 1396368e6 && 4 != r) return i = " vip_red ";
			var t = this.requireInstance("user/widget/userApi", []),
				n = $.getPageData("forum.forum_id", 0),
				s = {
					mParr_props: e
				};
			return t.checkSingleForumMembershipOf(s, n) && (i = " vip_red "), e && e.level && e.level.end_time > Env.server_time / 1e3 && (i = " vip_red "), i
		}
	}
});
_.Module.define({
	path: "common/widget/umoney_query",
	sub: {
		url: {
			queryCredit: "/tbapp/umoney/queryUserInfo",
			queryQualification: "/tbapp/umoney/queryQualification"
		},
		query_umoney_cls: ".j-query-umoney",
		umoneyInfoStatus: {
			s1: "\u672A\u7533\u8BF7",
			s2: "\u5BA1\u6838\u4E2D",
			s3: "\u6B63\u5E38",
			s4: "\u903E\u671F",
			s5: "\u51BB\u7ED3",
			s6: "\u5931\u8D25"
		},
		initial: function() {
			var e = this;
			e.$element = $(".tdou-umoney-query")
		},
		showUmoney: function(e) {
			var n = this,
				t = $.tb.format('<div class="tdou-umoney-query">          <span class="umoney-user">              #{displayText}:              <a class="j-query-umoney " href="javascript:void(0);"                 title="\u67E5\u770B\u6709\u94B1\u989D\u5EA6"                 locate="userinfo#\u767E\u5EA6\u6709\u94B1">                  \u67E5\u770B              </a>          </span>          <span class="umoney-placeholder">              <a target="_blank" href="/f?ie=utf-8&kw=\u767E\u5EA6\u6709\u94B1\u6D88\u8D39\u91D1\u878D"                 locate="userinfo#\u767E\u5EA6\u6709\u94B1">                  \u767E\u5EA6\u6709\u94B1\u9001T\u8C46              </a>          </span>  </div>', {
					displayText: e || "\u767E\u5EA6\u6709\u94B1\u989D\u5EA6"
				});
			return n.getUmoneyDom(t)
		},
		showUmoneyOnGotTdou: function() {
			var e = this,
				n = '<div class="tdou-umoney-query umoney-query-get-tdou">      <span class="umoney-placeholder">\u63D0\u9192\uFF1A\u60A8\u5728 pc\u53CA\u5B89\u5353\u4E0A\u83B7\u53D6\u7684T\u8C46\u4E0E\u5728ios\u4E0A\u83B7\u53D6\u7684T\u8C46\u4E0D\u901A\u7528\u3002</span>  </div>',
				t = e.getUmoneyDom(n);
			return t
		},
		showUmoneyMember: function() {
			var e = this,
				n = '<div class="tdou-umoney-query tshow-tdou-umoney-query">      <a  target="_blank" href="/f?ie=utf-8&kw=\u767E\u5EA6\u6709\u94B1\u6D88\u8D39\u91D1\u878D" locate="tshow-bar#\u767E\u5EA6\u6709\u94B1">          <span class="umoney-logo"></span>\u4F7F\u7528\u767E\u5EA6\u6709\u94B1\u8D2D\u4E70\u8D34\u5427\u4F1A\u5458\u4F18\u60E0          <span class="vip-red vip-discount">5%</span>      </a>  </div>';
			return e.$element = $(n), e.$element
		},
		getUmoneyDom: function(e) {
			var n = this;
			return this.$element = $(e), n.isUmoneyUser(), n.$element
		},
		bindEvents: function() {
			var e = this;
			e.$element.on("click", e.query_umoney_cls, function() {
				e.queryUmoneyCredit()
			})
		},
		queryUmoneyCredit: function() {
			var e = this;
			e._queryUmoneyCredit && e._queryUmoneyCredit.abort(), e._queryUmoneyCredit = $.ajax({
				type: "GET",
				url: e.url.queryCredit,
				data: {},
				cache: !1,
				dataType: "json"
			}).success(function(n) {
				if(e._queryUmoneyCredit = null, 0 == n.no) {
					var t = n.data && n.data.data;
					e.showCredit(t)
				}
			})
		},
		isUmoneyUser: function() {
			var e = this;
			e._isUmoneyUser && e._isUmoneyUser.abort(), e._isUmoneyUser = $.ajax({
				type: "GET",
				url: e.url.queryCredit,
				data: {},
				cache: !1,
				dataType: "json"
			}).success(function(n) {
				if(e._isUmoneyUser = null, 0 == n.no) {
					var t = n.data && n.data.data.status;
					"1" != t && (e.$element.find(".umoney-placeholder").end().find(".umoney-user").show(), e.bindEvents())
				} else e.$element.find(".umoney-user").hide().end().find(".umoney-placeholder").show()
			})
		},
		showCredit: function(e) {
			if(e) {
				var n = this,
					t = "";
				if(3 === e.status) {
					var o = e.credit || 0;
					t = o + "\u5143 "
				} else t = n.umoneyInfoStatus["s" + e.status];
				var a = t + ",\u70B9\u51FB\u5237\u65B0";
				n.$element.find(n.query_umoney_cls).html(t).addClass("umoney-credit").tbattr("title", a)
			}
		},
		track: function(e, n) {
			$.stats.track(e, "umoney-query", PageData.product + "-" + n, "click")
		}
	}
});
_.Module.define({
	path: "user/widget/myCurrentForum",
	sub: {
		initial: function(e) {
			this._opt = e, this.forum = PageData.forum, this.bindEvents()
		},
		bindEvents: function() {
			var e = this;
			$(".user_level .badge, .user_level .badge_block").bind("click", function() {
				return window.open("/f/like/level?kw=" + e.forum.name_url + "&lv_t=lv_nav_intro"), !1
			}), $(".user_level .exp_bar").bind("click", function() {
				return window.open("/f/like/level?kw=" + e.forum.name_url + "&lv_t=lv_nav_who"), !1
			})
		}
	}
});
_.Module.define({
	path: "tbmall/component/util",
	sub: {
		_propCategoryMap: {
			101: "\u53D1\u8D34\u6C14\u6CE1",
			102: "",
			103: "\u4E2A\u6027\u6C34\u5370",
			104: "\u70AB\u5F69\u5B57\u4F53",
			105: "",
			106: "",
			107: "\u9B54\u6CD5\u5F39",
			108: "\u8865\u7B7E\u795E\u5668",
			109: "\u52A8\u6001\u5934\u50CF",
			110: "\u5934\u50CF\u8FB9\u6846",
			111: "",
			112: "\u4E2A\u6027\u94ED\u724C",
			113: "\u540D\u7247\u80CC\u666F",
			114: "\u94ED\u724C\u91CD\u94F8\u5361",
			115: "",
			116: "\u8D34\u6761\u5361",
			117: "\u633D\u5C0A\u5361"
		},
		_freeUseMap: {
			1070001: 12,
			1070002: 12,
			1080001: 8
		},
		_badgeMap: {
			1: "\u8D34\u5427\u4F1A\u5458",
			2: "\u8D34\u5427\u8D85\u7EA7\u4F1A\u5458"
		},
		initial: function() {},
		badgeNameMap: function(e) {
			var a = parseInt(e);
			return a > 105e4 && (a -= 105e4), this._badgeMap[a]
		},
		getFreeUseCount: function(e) {
			return this._freeUseMap[e]
		},
		getMaxLevel: function(e) {
			var a = 0,
				t = (new Date).getTime(),
				n = e || PageData.user.Parr_props;
			if(!n || !n.level) return 0;
			var r = n.level;
			return 1e3 * r.end_time > t && parseInt(r.props_id, 10) > a && (a = parseInt(r.props_id, 10)), a
		},
		convertNumber: function(e) {
			return e > 99999999 ? Math.round(e / 1e8, 2) + "\u4EBF" : e > 99999 ? Math.round(e / 1e4, 2) + "\u4E07" : e
		},
		formatDate: function(e) {
			function a(e) {
				return e > 9 ? e : "0" + e.toString()
			}
			var t = new Date(1e3 * e);
			return t.getFullYear() + "\u5E74" + (t.getMonth() + 1) + "\u6708" + t.getDate() + "\u65E5 " + a(t.getHours()) + ":" + a(t.getMinutes())
		},
		hasOwnProp: function(e, a) {
			return PageData.props[e] && PageData.props[e][a] && 1e3 * PageData.props[e][a].end_time > Env.server_time
		},
		convertToDay: function(e) {
			return Math.ceil(e / 86400) + "\u5929"
		},
		getCategoryName: function(e) {
			return this._propCategoryMap[e]
		},
		getFreeInfo: function(e) {
			var a = this,
				t = '<div class="free_info">';
			return "1080002" == e.props_id ? (t += '<span  title="' + a.badgeNameMap(2) + '" >', t += '<a class="j_tbmall_join_vip_btn strong_txt level2"><span class="icon"></span>\u4E00\u6B21\u5145\u503C12\u4E2A\u6708\uFF0C</a>\u9001\u4E09\u5F20</span>') : 1 == e.props_type && a.getFreeUseCount(e.props_id) ? (t += '<span  title="' + a.badgeNameMap(2) + '" >', t += '<a class="j_tbmall_join_vip_btn strong_txt level2"><span class="icon"></span>\u5F00\u901A\u8D85\u7EA7\u4F1A\u5458</a>\u514D\u8D39\u4F7F\u7528', t += '<span class="free_use_count">' + a.getFreeUseCount(e.props_id) + "</span>\u4E2A</span>") : 1 != e.props_type && (t += '<span  title="' + a.badgeNameMap(e.free_user_level) + '" >', t += '<a class="j_tbmall_join_vip_btn strong_txt level' + e.free_user_level + '"><span class="icon"></span>\u5F00\u901A' + (2 == e.free_user_level ? "\u8D85\u7EA7" : "") + "\u4F1A\u5458</a>\u514D\u8D39\u4F7F\u7528</span>"), t += "</div>"
		},
		hasUsedProp: function(e, a) {
			return PageData.props[e] && !!PageData.props[e][a] && !!parseInt(PageData.props[e][a].open_status, 10)
		},
		hasBadge: function() {
			return PageData.props.level && PageData.props.level.prop_id && 1e3 * PageData.props.level.end_time > Env.server_time
		},
		shouldHaveProp: function(e) {
			return e > 0 && this.hasBadge() && PageData.props.level.prop_id >= e
		},
		getBuyInfo: function(e) {
			var a, t, n = this,
				r = "",
				s = e.props_category,
				p = e.props_id,
				o = e.free_user_level,
				_ = n.hasOwnProp(s, p),
				i = n.hasUsedProp(s, p),
				u = n.shouldHaveProp(o);
			return _ ? "1" === e.is_default_used && (i ? (t = "\u53D6\u6D88\u4F7F\u7528", a = "j_cancle_use") : (t = "\u4F7F\u7528", a = "j_use"), r += ['<a href="#" class="ui_btn ui_btn_sub_s ' + a + '">', "<span><em>" + t + "</em></span>", "</a>"].join("")) : (u ? (a = "j_get_button1", t = "\u9886\u53D6") : (a = "j_buy_button1", t = "\u5151&nbsp;&nbsp;\u6362"), "\u94ED\u724C\u91CD\u94F8\u5361" === e.name ? r = "" : r += ['<a class="ui_btn ui_btn_sub_s ' + a + '">', "<span><em>" + t + "</em></span>", "</a>"].join("")), r
		}
	}
});
_.Module.define({
	path: "tbmall/component/Dialog",
	sub: {
		initial: function() {},
		dialog: function(n) {
			var t = this;
			t.customDialog = new $.dialog({
				html: '<div class="dialog_ctn_wrapper"> ' + n + "</div>",
				title: "\u63D0\u793A",
				width: 430
			}), t.customDialog.bind("onclose", function() {
				t.trigger("onInfoClose")
			}), $(".charge_bean_interaction_j_charge_btn").click(function() {
				t.customDialog.close()
			}), $(".charge_bean_interaction_j_close_dialog").click(function(n) {
				n.preventDefault(), t.customDialog.close()
			})
		},
		info: function(n, t) {
			var i = this;
			t = t || {};
			var o = t.button || "\u786E \u5B9A";
			i.infoDialog = new $.dialog({
				html: '<div class="dialog_ctn_wrapper"> ' + n + '<div class="confirm_wrapper theme_info"><a class="ui_btn ui_btn_m yes"><span><em>' + o + "</em></span></a></div></div>",
				title: t.title || "\u63D0\u793A",
				width: t.width || 430
			}), i.infoDialog.element.one("click", ".yes", function(n) {
				n.preventDefault(), i.infoDialog.close(), i.trigger("onInfoYes")
			}), i.infoDialog.bind("onclose", function() {
				i.trigger("onInfoClose")
			})
		},
		confirm: function(n, t) {
			var i = this,
				o = {
					button: [{
						txt: "\u786E \u5B9A",
						extraclass: ""
					}, {
						txt: "\u53D6 \u6D88"
					}]
				};
			t = $.extend(o, t);
			var e = '<a class="ui_btn ui_btn_m yes ' + t.button[0].extraclass + '"><span><em>' + t.button[0].txt + '</em></span></a><a class="ui_btn ui_btn_sub_m no"><span><em>' + t.button[1].txt + "</em></span></a>";
			i.confirmDialog = new $.dialog({
				html: '<div class="dialog_ctn_wrapper"> ' + n + '<div class="confirm_wrapper">' + e + "</div></div>",
				title: "\u63D0\u793A",
				width: t.width || 430
			}), $(i.confirmDialog.getElement()).one("click", ".yes", function(n) {
				n.preventDefault(), "function" == typeof t.button[0].callback ? t.button[0].callback() : i.trigger("yes")
			}).one("click", ".no", function(n) {
				n.preventDefault(), "function" == typeof t.button[1].callback ? t.button[1].callback() : i.trigger("no")
			})
		},
		getConfirmDialog: function() {
			return this.confirmDialog
		},
		enableYesBtn: function() {
			this.confirmDialog.element.find(".yes").data("clicked", !1)
		},
		close: function() {
			this.confirmDialog && this.confirmDialog.close()
		}
	}
});
_.Module.define({
	requires: ["common/widget/LoginDialog", "common/widget/payMember"],
	path: "common/widget/JoinVipDialog",
	sub: {
		objGet: function(i, e, o) {
			o = void 0 === o ? null : o, e = e.split(".");
			var t, n = i;
			for(t in e) {
				if(!("object" == typeof n && e[t] in n)) return o;
				n = n[e[t]]
			}
			return n
		},
		objSet: function(i, e, o) {
			return i[e] = o, i
		},
		initial: function() {},
		getMemberDialog: function(i, e) {
			var o = this;
			return this.objGet(window, "PageData.user.is_login", !1) ? (this.gotoCashier(i, e), !1) : (o.requireInstance("common/widget/LoginDialog"), !1)
		},
		gotoCashier: function(i, e) {
			var o = this.requireInstance("common/widget/payMember"),
				t = this.objSet({}, "fr", i || "\u8D2D\u4E70\u4F1A\u5458");
			t = this.objSet(t, "scene_id", e || 0), o.showCashier(t)
		}
	}
});
_.Module.define({
	path: "tbmall/widget/ContSignCard",
	requires: ["tbmall/component/util", "tbmall/component/Dialog", "common/widget/JoinVipDialog"],
	sub: {
		_card_count: 0,
		_tpl: '<div class="header">\u70B9\u51FB\u6211\u5173\u6CE8\u7684\u5427\u4F7F\u7528\u8FDE\u7EED\u7B7E\u5230\u5361\uFF08<span class="condition">\u6CE8\uFF1A\u4F7F\u7528\u6761\u4EF6\u4E3A\u7D2F\u8BA1\u7B7E\u5230\u5929\u6570\u2265100\u5929\uFF0C\u4EC5\u4F1A\u5458\u53EF\u4EE5\u4F7F\u7528</span>\uFF09\uFF1A</div><div id="j_signable_list" class="signable_list"><img class="loading" src="//tb1.bdstatic.com/tb/static-tbmall/img/loading.gif"></div><div class="bottom_info"><div class="my_cont_card">\u6211\u6709<span class="j_card_count orange_txt">0</span>\u5F20<span class="orange_txt">\u8FDE\u7EED\u7B7E\u5230\u5361</span></div><p class="">\u8FDE\u7EED\u7B7E\u5230\u5361\u5C06\u628A\u9009\u4E2D\u5427\u6240\u6709\u7684\u7B7E\u5230\u5929\u6570\u8FDE\u7EED\u5728\u4E00\u8D77\uFF01</p> </div> <div class="free_info"><span title="\u8D85\u7EA7\u8D34\u5427\u4F1A\u5458"><a class="j_tbmall_join_vip_btn strong_txt level2"><span class="icon"></span>\u4E00\u6B21\u5145\u503C12\u4E2A\u6708\uFF0C</a>\u9001\u4E09\u5F20</span> </div>',
		initial: function() {
			var t = this;
			return t.util = t.use("tbmall/component/util"), t.mdialog = t.use("tbmall/component/Dialog"), t.vip = t.use("common/widget/JoinVipDialog"), PageData.user.is_login ? (t.build(), t.loadSignableList(), t.bindEvent(), void 0) : (_.Module.use("common/widget/LoginDialog"), void 0)
		},
		showMemberOnly: function() {
			var t = this,
				e = ['<div id="sign_tip_forNoMember" class="sign_tip_forNoMember">', "<p><span>\u8FDE\u7EED\u7B7E\u5230\u5361</span>\u662F\u4F1A\u5458\u4E13\u5C5E\u9053\u5177,\u6210\u4E3A\u4F1A\u5458\u5373\u53EF\u4F7F\u7528!</p>", '<a class="ui_btn ui_btn_m j_openMember" href="#"><span><em>\u9A6C\u4E0A\u5F00\u901A</em></span></a>', '<p><a class="j_tbmall_join_vip_btn level2_icon" href="#">\u5145\u6EE112\u4E2A\u6708\u8D85\u7EA7\u4F1A\u5458</a>\u9001\u4E09\u5F20</p>', "</div>"].join(""),
				i = new $.dialog({
					html: e,
					title: "\u63D0\u793A",
					width: 430,
					height: 100
				});
			$("#sign_tip_forNoMember").delegate(".j_openMember", "click", function(e) {
				e.preventDefault(), i.close(), t.vip.getMemberDialog()
			}), $("#sign_tip_forNoMember").delegate(".j_tbmall_join_vip_btn", "click", function(e) {
				e.preventDefault(), i.close(), t.vip.getMemberDialog()
			})
		},
		build: function() {
			var t = this;
			this._dialog = new $.dialog({
				title: "\u4F7F\u7528\u8FDE\u7EED\u7B7E\u5230\u5361",
				html: t._tpl,
				width: 662,
				holderClassName: "cont_sign_dialog",
				fixed: !1
			}), this._listdom = this._dialog.element.find("#j_signable_list")
		},
		loadSignableList: function() {
			var t = this,
				e = "";
			$.tb.get("/tbmall/get/getContSignableList", function(i) {
				if(i && 0 == i.no) {
					var a = i.data.list;
					if(a.length) {
						for(var n = 0, l = a.length; l > n; n++) e += '<a href="/f?kw=' + encodeURIComponent(a[n].forum_name) + '&ie=utf-8" target="_blank" data-fid="' + a[n].forum_id + '" class="signable_ba j_signable_ba">' + $.tb.subByte(a[n].forum_name, 11) + '<span class="forum_level lv' + a[n].level_id + '"></span></a> ';
						t._listdom.html(""), _.Module.use("common/widget/ScrollPanel", [{
							content: e,
							container: t._listdom,
							height: 210
						}])
					} else e = '<div class="no_signable_tip gray_txt">\u6CA1\u6709\u68C0\u6D4B\u5230\u4F60\u6709\u7D2F\u8BA1\u7B7E\u5230\u2265100\u5929\uFF0C\u6216\u8005\u65AD\u7B7E\u7684\u5427\uFF0C\u8BF7\u6838\u5B9E\u540E\u5237\u65B0\u9875\u9762\u3002</div>', t._dialog.element.find("#j_signable_list").height(280).html(e);
					t._card_count = i.data.card_count, t._dialog.element.find(".j_card_count").text(i.data.card_count)
				} else e = "\u54CE\u5440\uFF0C\u670D\u52A1\u5668\u62BD\u98CE\u4E86\uFF0C\u8BF7\u5173\u95ED\u7A97\u53E3\u91CD\u65B0\u52A0\u8F7D", t._dialog.element.find("#j_signable_list").html(e)
			})
		},
		bindEvent: function() {
			var t = this;
			this._dialog.element.on("click", ".j_signable_ba", function(e) {
				return t.util.getMaxLevel() ? ($(this).hasClass("signed") || (e.preventDefault(), t.showBubble($(this))), void 0) : (e.preventDefault(), t._dialog.close(), t.showMemberOnly(), void 0)
			}), this._dialog.bind("onclose", function() {
				t._bubble && t._bubble.closeBubble()
			})
		},
		showBubble: function(t) {
			var e = this;
			if(!e._isAjaxing) {
				var i = t.data("fid"),
					a = t.offset(),
					n = {
						arrow_dir: "up",
						bubble_css: {
							top: a.top + 37,
							left: a.left - 39,
							width: 172,
							height: 69,
							zIndex: 6e4
						},
						arrow_pos: {
							left: 87
						},
						wrap: $("body"),
						closeBtn: !0
					},
					l = '<div class="card_bubble_content"><span>\u6CA1\u6709<span class="blue_txt">\u8FDE\u7EED\u7B7E\u5230\u5361</span></span><div><a href="/tbmall/propslist?category=108" target="_blank" class="ui_btn ui_btn_sub_s j_buy_card"><span><em>\u7ACB\u5373\u8D2D\u4E70</em></span></a> </div></div>',
					s = '<div class="card_bubble_content"><span>\u9700\u8981\u6D88\u8017<span class="blue_txt">1\u5F20\u8FDE\u7EED\u7B7E\u5230\u5361</span></span><div><a class="ui_btn ui_btn_sub_s j_use_card"><span><em>\u786E \u5B9A</em></span></a> </div></div>',
					o = '<div class="card_bubble_content"><span class="blue_txt">\u5DF2\u7ECF\u6210\u529F\u4F7F\u7528\u8FDE\u7EED\u7B7E\u5230\u5361,\u70B9\u51FB\u5427\u540D\u67E5\u770B</span></div>',
					_ = '<div class="card_bubble_content"><span>\u8FDE\u7EED\u7B7E\u5230\u5931\u8D25\uFF0C\u8BF7\u7A0D\u540E\u518D\u8BD5~</span></div>';
				e._bubble && e._bubble.closeBubble(), n.content = e._card_count < 1 ? l : s, e._bubble = new UiBubbleTipBase(n), e._bubble.j_bubble.one("click", ".j_buy_card", function() {
					e._bubble.closeBubble()
				}).one("click", ".j_use_card", function(a) {
					a.preventDefault(), e._isAjaxing = !0, e._bubble.setContent('<div class="card_bubble_content"><img src="//tb1.bdstatic.com/tb/static-tbmall/img/loading.gif">\u6B63\u5728\u8FDE\u7EED\u7B7E\u5230...</div>'), $.tb.post("/tbmall/post/useContSignCard", {
						forum_id: i,
						tbs: PageData.tbs
					}, function(i) {
						e._isAjaxing = !1, i && 0 == i.no ? (e._card_count--, e._card_count = Math.max(0, e._card_count), e._dialog.element.find(".j_card_count").text(e._card_count), e._bubble.setContent(o), t.addClass("signed")) : e._bubble.setContent(_)
					})
				}), e._bubble.showBubble()
			}
		}
	}
});
_.Module.define({
	path: "ucenter/widget/sign_mod",
	sub: {
		_jq_wrap: null,
		_options: {},
		initial: function(n, e) {
			this._jq_wrap = n, this._options = $.extend(this._options, e), this.signRank.options = e, this.signRank.sign_init(n, this._options), this.signRank.pvLog()
		},
		signRank: {
			sign_url: "/sign/add",
			sign_forum: "/sign/info",
			get_url: "/sign/loadmonth",
			month_url: "/sign/month",
			sign_card: null,
			sign_year: null,
			sign_month: null,
			orign_year: null,
			orign_month: null,
			rights_tips: [null, null, null, null, null],
			mouseEventTimer: null,
			rightsTipsTimer: null,
			isReplenishing: !1,
			rplnBubble: null,
			resign_card_num: 0,
			rpln_available_time: 13858272e5,
			jq_wrap: null,
			_resignMap: {
				2280001: "\u60A8\u5C1A\u5728\u9ED1\u540D\u5355\u4E2D\uFF0C\u4E0D\u80FD\u64CD\u4F5C",
				2280002: "\u4EB2\uFF0C\u60A8\u5DF2\u88AB\u5C01\u7981\uFF0C\u7B7E\u5230\u6210\u529F\uFF0C\u4F46\u65E0\u6CD5\u6DA8\u7ECF\u9A8C\u54E6~",
				2280003: "\u7B7E\u5230\u592A\u9891\u7E41\u4E86\u70B9\uFF0C\u4F11\u606F\u7247\u523B\u518D\u6765\u5427:)",
				2280004: "\u5F53\u524D\u7B7E\u5230\u4EBA\u6570\u592A\u591A\uFF0C\u8BF7\u7A0D\u540E\u518D\u7B7E",
				2280005: "\u7B7E\u5230\u592A\u9891\u7E41\u4E86\u70B9\uFF0C\u4F11\u606F\u7247\u523B\u518D\u6765\u5427:)",
				2280006: "\u60A8\u5DF2\u7ECF\u7B7E\u8FC7\u5230\u4E86\uFF0C\u8BF7\u660E\u5929\u7EE7\u7EED\u7B7E\u5230^_^",
				2280007: "\u7B7E\u5230\u670D\u52A1\u5FD9\uFF0C\u8BF7\u91CD\u65B0\u7B7E\u5230",
				2280008: "\u670D\u52A1\u5668\u6253\u76F9\u4E86\uFF0C\u518D\u7B7E\u4E00\u6B21\u53EB\u9192\u5B83",
				2280009: "\u8BE5\u7528\u6237\u6CA1\u6709\u7B7E\u5230",
				2280010: "\u670D\u52A1\u5668\u6253\u76F9\u4E86\uFF0C\u518D\u7B7E\u4E00\u6B21\u53EB\u9192\u5B83",
				2280011: "\u670D\u52A1\u5668\u6253\u76F9\u4E86\uFF0C\u518D\u7B7E\u4E00\u6B21\u53EB\u9192\u5B83",
				2280012: "\u8865\u7B7E\u5361\u4E0D\u8DB3\uFF0C\u8BF7\u5148\u8D2D\u4E70\u8865\u7B7E\u5361",
				2280013: "\u6570\u636E\u5E93\u8BBF\u95EE\u6210\u529F\uFF0C\u4F46\u6570\u636E\u4E0D\u5B58\u5728",
				2280014: "\u8865\u7B7E\u5361\u4F7F\u7528\u6570\u636E\u91CF\u8D85\u8FC7\u9650\u5236\uFF0C\u8BF7\u660E\u65E5\u7EE7\u7EED"
			},
			_client_html: ['<div class="sign_card">', '<h2 class="sign_card_title">' + PageUnit.load("sign_mod_card_title") + "</h2>", '<div class="sign_card_detail">' + PageUnit.load("sign_mod_card_detail") + "</div>", '<a rel="noreferrer" href="https://tiebac.baidu.com/c/s/download/pc?src=webtb&t=2&tab=5#img5" target="_blank" class="sign_card_positive_btn">', PageUnit.load("sign_mod_card_positive_btn") + "</a>", '<a rel="noreferrer" href="/home/main?id=' + PageData.user.portrait + '#scardsign" target="_blank" class="sign_card_sign_btn">' + PageUnit.load("sign_mod_card_no_txt") + "</a>", "</div>"].join(""),
			sign_init: function(n, e) {
				var i = this,
					s = this.jq_wrap = n;
				if("sign_rank" == $.cookie("add_sign") && (PageData.is_sign_in || i.showCardBeforeSign(), $.cookie("add_sign", null)), "true" == $.cookie("sign_not_now") && (s.find(".j_signbtn").removeClass("j_cansign").addClass("signstar_ing"), setTimeout(function() {
						s.find(".j_signbtn").removeClass("signstar_ing").addClass("j_cansign")
					}, 1e4)), PageData.is_sign_in) i.sign_resetdate(), i.sign_load_month(0), i.cal_mouseEnterOut(), setInterval(function() {
					i.refresh_sign_rank()
				}, 3e5);
				else {
					{
						var t = new Date(Env.server_time);
						t.getDay()
					}
					s.find(".j_signbtn").addClass("j_cansign")
				}
				s.on("click", ".j_cont_sign_card", function(n) {
					n.preventDefault();
					var e = $(".j_sign_succ_keep").text(),
						s = $(".j_sign_succ_count").text();
					$(this).hasClass("j_need_judge") && e == s ? i.showAlreadyUsed($(this)) : _.Module.use("tbmall/widget/ContSignCard")
				}), s.on("click", ".j_onekey_btn", function(n) {
					PageData.user.is_login || (n.preventDefault(), _.Module.use("common/widget/LoginDialog"))
				}), s.find(".j_btn_getmember").on("click", function() {
					return _.Module.use("common/widget/JoinVipDialog", [], function(n) {
						n.getMemberDialog()
					}), !1
				}), s.on("click", ".j_cansign", function() {
					PageData.user.is_login ? PageData.user.is_black ? i.show_block_sign_dialog() : i.showCardBeforeSign() : _.Module.use("common/widget/LoginDialog", ["", "", function() {
						$.cookie("add_sign", "sign_rank", {
							expires: 14
						}), $.tb.location.reload()
					}])
				}), s.find(".j_calendar_month_prev").click(function() {
					var n = new Date(i.sign_year, i.sign_month - 1, 1),
						e = new Date(i.orign_year - 2, i.orign_month - 1, 1),
						s = new Date(2012, 6, 1);
					n.getTime() <= e.getTime() || n.getTime() <= s.getTime() || i.set_sign_calendar("", i.sign_year, i.sign_month, -1)
				}), s.find(".j_calendar_month_next").click(function() {
					i.sign_year > i.orign_year || i.sign_year == i.orign_year && i.sign_month >= i.orign_month || i.set_sign_calendar("", i.sign_year, i.sign_month, 1)
				}), PageData.user.is_login && (s.find(".j_sign_rights").show(), s.find(".j_sign_rights_icon").each(function(n, e) {
					$(e).mouseover(function() {
						i.rightsTipsTimer = setTimeout(function() {
							i.sign_right_tips(n)
						}, 400)
					}).mouseout(function() {
						window.clearInterval(i.rightsTipsTimer), i.rightsTipsTimer = window.setTimeout(function() {
							null != i.rights_tips[n] && i.rights_tips[n].hideBubble()
						}, 10)
					})
				}));
				var a = PageData.user,
					r = a.mPaar_props && a.mParr_props.level && a.mParr_props.level.props_id > 0 && a.mParr_props.level.end_time > Env.server_time / 1e3,
					o = "sign_box_bright_hover";
				o = e.hasClass ? r ? "sign_box_member_bright_hover" : "sign_box_bright_hover" : r ? "sign_box_member_bright_noclass_hover" : "sign_box_bright_noclass_hover";
				var l = s.find(".j_sign_box");
				l.hover(function() {
					$(this).addClass(o)
				}, function() {
					$(this).removeClass(o)
				});
				var g = s.find(".j_sign_dir_tip"),
					d = g.html();
				g.html("");
				var c = {
						content: d,
						arrow_dir: "up",
						bubble_css: {
							top: -12,
							left: e.hasClass ? 4 : 50,
							width: e.hasClass ? "pb" == e.page ? 192 : 200 : 120,
							"text-align": "left"
						},
						arrow_pos: {
							right: e.hasClass ? 30 : -9
						},
						attr: " id='tb_message_tip_n' ",
						wrap: g,
						closeBtn: !1
					},
					u = new UiBubbleTipBase(c),
					m = l.find(".j_signdir");
				m.bind("mouseenter", function() {
					g.show(), u.showBubble()
				}).bind("mouseleave", function() {
					u.hideBubble()
				});
				var p = $(".lack_sign_monthly_tip_card");
				s.find(".j_lack_sign_monthly_help").on("click", function(n) {
					n.preventDefault(), p.fadeIn("fast")
				}).on("mouseleave", function() {
					p.timeout = setTimeout(function() {
						p.fadeOut("fast")
					}, 1e3)
				}), p.on("mouseenter", function() {
					clearTimeout(p.timeout), p.fadeIn("fast")
				}).on("mouseleave", function() {
					p.fadeOut("fast")
				}), s.find(".j_sign_tip_1key_icon").on("click", function() {
					$.stats.track("\u7B7E\u5230_\u4E00\u952E\u7B7E\u5230icon", "\u7B7E\u5230\u6539\u9020", {
						obj_type: "\u7B7E\u5230",
						obj_url: $(this).tbattr("href")
					})
				})
			},
			showAlreadyUsed: function(n) {
				this._alreadyUsedBb && this._alreadyUsedBb.closeBubble();
				var e = {
					content: "\u672C\u5427\u6240\u6709\u7B7E\u5230\u5DF2\u7ECF\u8FDE\u7EED\uFF0C\u8BF7\u53BB\u522B\u7684\u5427\u770B\u770B",
					arrow_dir: "down",
					bubble_css: {
						top: -40,
						left: 8,
						width: 143,
						height: 53
					},
					arrow_pos: {
						left: 70
					},
					wrap: n.parent(),
					closeBtn: !0
				};
				this._alreadyUsedBb = new UiBubbleTipBase(e), this._alreadyUsedBb.showBubble()
			},
			showCardBeforeSign: function() {
				var n = this,
					e = $(".j_signbtn");
				"1" == $.cookie("showCardBeforeSign") || n.sign_card ? n.sign_add() : _.Module.use("common/widget/Card", [{
					content: n._client_html,
					arrow_dir: "up",
					card_css: {
						width: 197,
						top: e.offset().top + e.height() + 11,
						left: e.offset().left
					},
					card_leave_hide: !0
				}], function(e) {
					n.sign_card = e, n.bindCardEvent(), e.showCard(), $.cookie("showCardBeforeSign", "1", {
						expires: 1
					})
				})
			},
			bindCardEvent: function() {
				var n = this;
				$(".sign_card_negative_btn").on("click", function(e) {
					e.preventDefault(), n.sign_card && n.sign_card._j_card.hide(), n.sign_add()
				})
			},
			sign_resetdate: function() {
				var n = new Date(Env.server_time);
				this.sign_year = this.orign_year = n.getFullYear(), this.sign_month = this.orign_month = n.getMonth() + 1
			},
			cal_mouseEnterOut: function() {
				var n = this,
					e = this.jq_wrap;
				e.find(".j_sign_replenish_button").off().on("click", function(i) {
					i.preventDefault(), "none" == e.find(".j_succ_info").css("display") && (n.orign_year != n.sign_year || n.orign_month != n.sign_month) && (n.sign_resetdate(), n.sign_load_month(0)), window.clearInterval(n.mouseEventTimer), n.mouseEventTimer = setTimeout(function() {
						e.find(".j_succ_info").stop(!0, !0).show()
					}, 400)
				}), e.find(".j_signbtn,.j_succ_info").die().live({
					mouseout: function() {
						window.clearInterval(n.mouseEventTimer), n.mouseEventTimer = window.setTimeout(function() {
							e.find(".j_succ_info").fadeOut("slow")
						}, 200)
					},
					mouseover: function() {
						"none" == e.find(".j_succ_info").css("display") && (n.orign_year != n.sign_year || n.orign_month != n.sign_month) && (n.sign_resetdate(), n.sign_load_month(0)), window.clearInterval(n.mouseEventTimer), n.mouseEventTimer = setTimeout(function() {
							e.find(".j_succ_info").stop(!0, !0).show()
						}, 400)
					}
				})
			},
			cal_mouseEventRemove: function() {
				window.clearInterval(self.mouseEventTimer), this.jq_wrap.find(".j_signbtn,.j_succ_info").die()
			},
			sign_add: function(n) {
				var e = this,
					i = {
						kw: $.tb.escapeHTML(PageData.forum.forum_name),
						tbs: PageData.tbs,
						ie: "utf-8"
					};
				$.extend(i, n), this.jq_wrap.find(".j_signbtn").removeClass("j_cansign").addClass("signstar_ing"), $.tb.post(e.sign_url, i, function(n) {
					if(n && 1990055 == n.no)
						if(e.jq_wrap.find(".j_signbtn").removeClass("signstar_ing").addClass("j_cansign"), "undefined" == typeof passport || "undefined" == typeof passport.pop.init) {
							var i = "undefined" != typeof Env && Env.server_time ? Env.server_time : (new Date).getTime(),
								s = "https://passport";
							$.JsLoadManager.use([s + ".baidu.com/passApi/js/uni_login_wrapper.js?cdnversion=" + Math.floor(i / 6e4), s + ".baidu.com/passApi/js/wrapper.js?cdnversion=" + Math.floor(i / 6e4)], function() {
								window.realname = passport.pop.init({
									type: "accRealName",
									apiOpt: {
										product: "tb",
										staticPage: "//tieba.baidu.com/tb/static-common/html/pass/v3Jump.html"
									},
									tangram: !0,
									color: "green"
								}), window.realname.show()
							}, !0, "utf-8")
						} else window.realname.show();
					else if(!n || 0 != n.no && 1104 != n.no)
						if(n && 2150040 == n.no) _.Module.use("common/component/CaptchaDialog", {
							message: "\u8BF7\u8F93\u5165\u9A8C\u8BC1\u7801\u5B8C\u6210\u7B7E\u5230",
							vCode: n.data.captcha_vcode_str,
							vCodeType: n.data.captcha_code_type,
							title: "\u7B7E\u5230",
							forumName: "",
							forumId: "",
							checkUrl: "/sign/checkVcode",
							vCodeUrl: "/sign/getVcode",
							paramsCallback: function() {
								return {
									tbs: PageData.tbs
								}
							}
						}, function(n) {
							n.bind("onaccept", function() {
								e.sign_add({
									captcha_input_str: n.getInputValue(),
									captcha_vcode_str: n.getVCode()
								})
							}), n.bind("onclose", function() {
								e.jq_wrap.find(".j_signbtn").removeClass("signstar_ing").addClass("j_cansign")
							}), n.show()
						});
						else {
							setTimeout(function() {
								e.jq_wrap.find(".j_signbtn").removeClass("signstar_ing").addClass("j_cansign")
							}, 1e4);
							var t = new Date;
							if(t.setTime(t.getTime() + 1e4), $.cookie("sign_not_now", !0, {
									expires: t
								}), 1007 == n.no) {
								var a = e.jq_wrap.find(".j_signbtn");
								a.removeClass().addClass("j_signbtn signstar_full")
							} else new $.dialog({
								html: "<div class='signmod_likeandsign_dialog'>" + e._resignMap[n.no] || n.error + "</div>",
								holderClassName: "passportDialog",
								title: "\u7B7E\u5230\u5931\u8D25",
								draggable: !1,
								width: 338,
								height: 87
							})
						}
					else {
						var r = n.data.uinfo,
							o = new Date(r.sign_time);
						e.sign_year = e.orign_year = o.getFullYear(), e.sign_month = e.orign_month = o.getMonth() + 1, e.sign_load_month(1), PageData.is_activity_sign && $.tb.location.reload()
					}
				}, "json")
			},
			sign_load_month: function(n, e, i) {
				var s = this;
				$.tb.get(s.get_url, {
					kw: $.tb.escapeHTML(PageData.forum.forum_name),
					ie: "utf-8",
					sign_y: e,
					sign_m: i,
					t: Math.random()
				}, function(t) {
					if(t && 0 == t.no) {
						s.jq_wrap.find(".j_signin_index").html(t.data.sign_user_info.rank), s.jq_wrap.find(".j_succ_text").html(s.succ_text(PageData.sign_forum_info && PageData.sign_forum_info.current_rank_info.sign_rank, t.data.sign_user_info.rank, PageData.sign_forum_info.forum_info && PageData.sign_forum_info.forum_info.level_1_dir_name, t.data.sign_user_info.sign_keep)), s.jq_wrap.find(".j_sign_succ_keep").html(t.data.sign_user_info.sign_keep), s.jq_wrap.find(".j_sign_succ_count").html(t.data.sign_user_info.sign_total), s.setReplenishInfo(t), $(".j_sign_month_lack_days").text(t.data.resign_info.mon_miss_sign_num), e && i || (s.sign_resetdate(), s.set_sign_calendar(t)), s.signShai(t), s.check_rights_status(t.data.sign_user_info.sign_keep);
						var a = s.jq_wrap.find(".j_signbtn"),
							_ = s.jq_wrap.find(".j_sign_box");
						if(_[0] && _.addClass("sign_box_bright_signed"), a.removeClass().addClass("j_signbtn signstar_signed"), n) {
							var r = t.data.sign_user_info.sign_keep;
							s.jq_wrap.find(".j_succ_info").show(), a.append('<span class="sign_keep_span">\u8FDE\u7EED' + r + "\u5929</span>"), (30 == r || 100 == r) && s.sign_100({
								username: PageData.user.user_name,
								forumname: PageData.forum.forum_name,
								memberCount: PageData.memberNumber,
								memberTitle: PageData.memberTitle,
								continueSign: r
							});
							var o = {
									normal: [2, 4],
									baidubrowser: [3, 5],
									member: [8, 10],
									annualMember: [14, 16],
									seniormember: [12, 14]
								},
								l = r > 1 ? 1 : 0,
								g = "normal";
							try {
								g = "baidubrowser.tieba" == window.external.GetVersion("version") ? "baidubrowser" : "normal"
							} catch(d) {}
							if(PageData.user.mParr_props && PageData.user.mParr_props.level) {
								var c = PageData.user.mParr_props.level;
								1e3 * c.end_time > +new Date && (g = 2 == c.props_id ? "seniormember" : 1 == c.props_id ? "member" : "normal")
							}
							3 === +$.getPageData("user.vipInfo.v_status", 0) && $.getPageData("annualMemberMode") === !0 && (g = "annualMember");
							var u = '<div style="position:absolute;"><div class="sign_plus_two">+' + o[g][l] + " \u7ECF\u9A8C</div></div>";
							PageData.user.is_like && !PageData.user.is_block && (s.jq_wrap.find(".signed_day:last").append(u), setTimeout(function() {
								$(".sign_plus_two").show().animate({
									opacity: 0,
									top: "-=20"
								}, 2500, function() {
									$(this).parent().remove()
								})
							}, 1e3)), "member" == g || "seniormember" == g ? s.jq_wrap.find(".signed_day:last").removeClass("signed_day").addClass("signed_member_anime") : s.jq_wrap.find(".signed_day:last").removeClass("signed_day").addClass("signed_anime_day")
						} else s.jq_wrap.find(".j_sign_btn_keep").text(r);
						s.cal_mouseEnterOut()
					}
				}, "json")
			},
			setReplenishInfo: function(n) {
				var e = this.jq_wrap.find(".j_succ_info"),
					i = this.jq_wrap.find(".sign_keep_span"),
					s = 0;
				i.length > 0 && i.text("\u8FDE\u7EED" + n.data.sign_user_info.sign_keep + "\u5929");
				var t = n.data.resign_info;
				s = this.resign_card_num = t.resign_card_num, $(".rpln_card_wrap").removeClass("rpln_card_wrap_2 rpln_card_wrap_3"), t.resign_card_num <= 9 || (t.resign_card_num > 9 && t.resign_card_num < 100 ? $(".rpln_card_wrap").addClass("rpln_card_wrap_2") : (s = "99+", $(".rpln_card_wrap").addClass("rpln_card_wrap_3"))), e.find(".j_rpln_card_count").text(s), 0 == t.mon_miss_sign_num ? this.jq_wrap.find(".j_need_rpln_wrap").text("\u672C\u6708\u5B8C\u7F8E\u7B7E\u5230") : this.jq_wrap.find(".j_need_rpln_wrap").html('\u672C\u6708\u6F0F\u7B7E<span class="j_lack_sign_monthly_count sign_num">' + t.mon_miss_sign_num + "</span>\u6B21")
			},
			refresh_sign_rank: function() {
				var n = {
					kw: $.tb.escapeHTML(PageData.forum.forum_name),
					ie: "utf-8",
					tbs: PageData.tbs
				};
				$.tb.get(this.sign_forum, n, function(n) {
					var e = !1;
					try {
						var i = n
					} catch(s) {
						e = !0
					}
					e || i && 0 == i.no && ($(".j_today_signnum").html(i.data.forum_info.current_rank_info.sign_count), $(".j_signrank_index").html(i.data.forum_info.current_rank_info.sign_rank))
				})
			},
			show_block_sign_dialog: function() {
				var n = new $.dialog({
					html: "<div class='signmod_likeandsign_dialog'>\u5728\u672C\u5427\u7B7E\u5230\u9700\u8981\u5148\u6210\u4E3A\u4F1A\u5458\u54E6~\u52A0\u5165\u6211\u4EEC\u5427\uFF01</div><div class='signmod_likeandsign_btnzone'><input class='signmod_confirm_btn j_sign_confirm' type='button' value='\u77E5\u9053\u4E86' /></div>",
					holderClassName: "passportDialog",
					title: "\u672C\u5427\u7B7E\u5230",
					draggable: !1,
					width: 338,
					height: 87
				});
				$(n.element[0]).find(".j_sign_confirm").click(function() {
					n.close()
				})
			},
			succ_text: function(n, e, i, s) {
				if(s) {
					if(9 == s) return "\u4FDD\u6301\u8FDE\u7EED\u7B7E\u5230\u5373\u53EF\u83B7\u5F97\u53D1\u8D34\u5B57\u4F53\u52A0\u7C97\u529F\u80FD\uFF0C\u660E\u5929\u4E0D\u8981\u5FD8\u4E86\u6765\u7B7E\u5230\u54E6\u3002";
					if(10 == s) return "\u606D\u559C\u83B7\u5F97\u53D1\u8D34\u5B57\u4F53\u52A0\u7C97\u529F\u80FD\uFF0C\u53D1\u8D34\u70AB\u8000\u5427\uFF01\u4FDD\u6301\u8FDE\u7EED\u7B7E\u5230\u54E6~";
					if(19 == s) return "\u4FDD\u6301\u8FDE\u7EED\u7B7E\u5230\u5373\u53EF\u83B7\u5F97\u53D1\u8D34\u5B57\u4F53\u53D8\u7EA2\u529F\u80FD\uFF0C\u660E\u5929\u4E0D\u8981\u5FD8\u4E86\u6765\u7B7E\u5230\u54E6\u3002";
					if(20 == s) return "\u606D\u559C\u83B7\u5F97\u53D1\u8D34\u5B57\u4F53\u53D8\u7EA2\u529F\u80FD\uFF0C\u53D1\u8D34\u70AB\u8000\u5427\uFF01\u4FDD\u6301\u8FDE\u7EED\u7B7E\u5230\u54E6~";
					if(29 == s) return "\u5DF2\u8FDE\u7EED\u7B7E\u523029\u5929\uFF0C\u660E\u65E5\u7B7E\u5230\u5373\u53EF\u83B7\u5F97ID\u7EA2\u8272\u9AD8\u4EAE\u6548\u679C\uFF0C\u4E0D\u8981\u5FD8\u4E86\u54E6~";
					if(30 == s) return "\u606D\u559C\u4F60\u83B7\u5F97ID\u7EA2\u8272\u9AD8\u4EAE\u6548\u679C\uFF0C\u8D76\u7D27\u53D1\u8D34\u70AB\u8000\u5427\u3002\u4FDD\u6301\u8FDE\u7EED\u7B7E\u5230\u54E6~"
				}
				var t;
				if(10 >= e) switch(parseInt(e)) {
						case 1:
							t = "\u606D\u559C\u4F60\u62A2\u5F97\u672C\u5427\u4ECA\u65E5\u7B7E\u5230\u7B2C1\u540D\uFF0C\u8D76\u7D27\u622A\u56FE\u7559\u5FF5\u5427~~";
							break;
						case 2:
							t = "\u672C\u5427\u4ECA\u65E5\u7B7E\u5230\u7B2C1\u4EBA\u88AB\u62A2\u8D70\u4E86\u2026\u2026\u660E\u5929\u518D\u6765\u65E9\u4E00\u70B9\u5427~";
							break;
						default:
							t = "\u606D\u559C\u4F60\u540D\u5217\u672C\u5427\u4ECA\u65E5\u7B7E\u5230\u524D10\uFF0C\u83B7\u5F97\u201C\u672C\u5427\u5FE0\u8BDA\u5427\u53CB\u201D\u79F0\u53F7~"
					} else if(100 == e) t = "\u54A6\uFF0C\u4E00\u4E0D\u5C0F\u5FC3\u5C31\u8E29\u5230100\u4E86\uFF0C\u4ECA\u5929\u4F1A\u6709\u597D\u8FD0\u6C14\u5594~";
					else if(250 == e) t = "\u8BF7\u5728\u5FC3\u4E2D\u9ED8\u5FF53\u904D\uFF1A\u6211\u4E0D\u662F250\u6211\u4E0D\u662F250\u6211\u4E0D\u662F250\u2026\u2026";
				else if(1e3 == e) t = "\u524D\u9762999\u4EBA\u7684\u7ECF\u8FC7\uFF0C\u53EA\u4E3A\u4E86\u6210\u5168\u4F60\u7684\u5706\u6EE1\u2026\u2026";
				else if(1e4 == e) t = "\u80FD\u8E29\u5230\u5982\u6B64\u5927\u6574\u5B9E\u5728\u662F\u4EBA\u54C1\u7206\u68DA\u554A\uFF01\u53EF\u4EE5\u51FA\u95E8\u4E70\u5F69\u7968\u4E86~";
				else if(100 >= n) switch(parseInt(n)) {
					case 1:
						t = "\u672C\u5427\u7B2C\u4E00\u7684\u5730\u4F4D\uFF0C\u53C8\u7A33\u5B9A\u4E86\u7A33\u5B9A\u4E86\u7A33\u5B9A\u4E86\u2026\u2026";
						break;
					case 2:
						t = "\u672C\u5427\u79BB\u7B2C\u4E00\u540D\u53C8\u8FD1\u4E86\u4E00\u70B9\u70B9\u70B9\u70B9\uFF0C\u52A0\u6CB9\uFF01";
						break;
					case 3:
						t = "\u4FDD\u6301\u524D\u4E09\u540D\u4E0D\u5BB9\u6613\uFF0C\u8BB0\u5F97\u660E\u5929\u8981\u6765\u7B7E\u5230\u54E6~~";
						break;
					default:
						t = 10 >= n ? "\u524D\u5341\u540D\u7ADE\u4E89\u6FC0\u70C8\uFF0C\u8BB0\u5F97\u6BCF\u5929\u90FD\u6765\u7B7E\u5230\u54E6~" : 30 >= n ? "\u79BB\u524D\u5341\u540D\u8FD8\u6709\u4E9B\u8DDD\u79BB\uFF0C\u5927\u5BB6\u6765\u5F97\u66F4\u52E4\u5FEB\u4E9B\u5427~" : "\u4E00\u767E\u5F3A\u7684\u5730\u4F4D\u9700\u8981\u5927\u5BB6\u7684\u5171\u540C\u52AA\u529B\uFF0C\u52A0\u6CB9\uFF01"
				} else t = "\u8BB0\u5F97\u660E\u5929\u8981\u6765\u7B7E\u5230\u54E6\uFF0C\u5E2E\u672C\u5427\u63D0\u5347\u6392\u540D~";
				return t
			},
			set_sign_calendar: function(n, e, i, s) {
				function t(n) {
					for(var e = n.data.sign_user_info.sign_month, i = ["\uFF0C\u7B7E\u5230\u7ECF\u9A8C+2\uFF0C\u8FDE\u7EED\u7B7E\u5230+4", "\uFF0C\u624B\u673A\u7B7E\u5230\u7ECF\u9A8C+3\uFF0C\u8FDE\u7EED\u7B7E\u5230+5", "\uFF0C\u767E\u5EA6\u6D4F\u89C8\u5668\u7B7E\u5230\u7ECF\u9A8C+3\uFF0C\u8FDE\u7EED\u7B7E\u5230+5", "\uFF0C\u767E\u5EA6\u624B\u673A\u6D4F\u89C8\u5668\u7B7E\u5230\u7ECF\u9A8C+4\uFF0C\u8FDE\u7EED\u7B7E\u5230+6", "\uFF0C\u7B7E\u5230\u7ECF\u9A8C+6\uFF0C\u8FDE\u7EED\u7B7E\u5230+8", "\uFF0C\u4F7F\u7528\u4F1A\u5458\u7B7E\u5230\u7ECF\u9A8C+8\uFF0C\u8FDE\u7EED\u7B7E\u5230+10", "\uFF0C\u4F7F\u7528\u9AD8\u7EA7\u4F1A\u5458\u7B7E\u5230\u7ECF\u9A8C+12\uFF0C\u8FDE\u7EED\u7B7E\u5230\u7ECF\u9A8C+14", ""], s = 0; s < e.length; s++) {
						var t = e[s],
							a = t.t,
							o = a.substr(0, a.indexOf(":")),
							l = a.substr(a.indexOf(":") + 1),
							g = "\u4E8E" + o + "\u70B9" + l + "\u5206\uFF0C\u7B2C" + t.rank + "\u4E2A\u7B7E\u5230";
						"00" == o && "00" == l && "" == t.rank && (g = "\u989D\uFF0C\u670D\u52A1\u5668\u8FD9\u5929\u6253\u76F9\u4E86\uFF0C\u6CA1\u8BB0\u4F4F\u4F60\u662F\u51E0\u70B9\u7B7E\u5230\u7684\uFF0C\u62B1\u6B49...");
						var d = parseInt(t.d);
						r.push(d);
						var c = "signed_day",
							u = 7;
						switch(t.sign_type) {
							case "pc":
								u = 0, c = "signed_day";
								break;
							case "mobile":
								u = 1, c = "signed_mob_day";
								break;
							case "brs":
								u = 2, c = "signed_day";
								break;
							case "mobile_brs":
								u = 3, c = "signed_mob_day";
								break;
							case "mobile_client":
								u = 4, c = "signed_mob_day";
								break;
							case "member":
								u = 5, c = "signed_member";
								break;
							case "senior_member":
								u = 6, c = "signed_member"
						}
						var m = g + i[u];
						PageData.user && 1 == PageData.user.is_block && (c = "", m = g + "\uFF0C\u60A8\u5F53\u524D\u5DF2\u88AB\u5C01\u7981\uFF0C\u6682\u65E0\u7B7E\u5230\u7ECF\u9A8C"), t.is_resign && (c = "signed_rpln_day", m = "\u8865\u7B7E\u6210\u529F\uFF0C\u8865\u7B7E\u7ECF\u9A8C+" + t.sign_score), n.data.is_detail || (c = "sign_gray", m = ""), _.find(".j_d_" + d).addClass(c).tbattr({
							title: m
						})
					}
				}

				function a() {
					var n = _.find(".j_canlerdar_days"),
						e = n.find("td").filter(function() {
							return !$(this).hasClass("emptyDate")
						});
					if(e.each(function(n) {
							var e = new Date(o.sign_year, o.sign_month - 1, n + 1);
							$.inArray(n + 1, r) < 0 && e < o.getEnvInitialTime() && e >= Math.max(o.rpln_available_time, o.getEnvInitialTime() - 2592e6) && ($(this).addClass("unsigned_day"), $.browser.mozilla && $(this).children(".mozilla_td_hack").length < 1 && $(this).append('<div class="mozilla_td_hack" style="position:absolute"></div>'))
						}), n.off().on("mouseenter", ".unsigned_day", function() {
							$(this).addClass("unsigned_day_hover")
						}).on("mouseleave", ".unsigned_day", function() {
							$(this).removeClass("unsigned_day_hover"), o.rplnBubble && o.rplnBubble.closeBubble()
						}).on("click", ".unsigned_day", function() {
							o.delReplenishSignGuide(), o.replenishSign($(this))
						}), "1" !== $.cookie("rpln_guide")) {
						var i = e.filter(".unsigned_day").last();
						if(i.length > 0) {
							var s = parseInt(i.text()),
								t = new Date(o.sign_year, o.sign_month - 1, s);
							t >= o.rpln_available_time && (i.addClass("rpln_guide_day"), o.setReplenishSignGuide(i.parent().index()), $.cookie("rpln_guide", "1", {
								expires: 1e3
							}))
						}
					}
				}
				var _ = this.jq_wrap,
					r = [],
					o = this;
				("" == e || "undefined" == typeof e) && (e = this.sign_year), ("" == i || "undefined" == typeof i) && (i = this.sign_month), "undefined" != typeof s && (s = parseInt(s), 0 > s ? (i -= 1, 0 == i && (e -= 1, i = 12)) : s > 0 && (i += 1, 13 == i && (e += 1, i = 1)));
				var l, g, d, c;
				l = new Date(e, i - 1, 1), g = new Date(e, i, 0), d = l.getDay(), c = g.getDate(), _.find(".j_5, .j_6").css({
					display: "none"
				});
				for(var u = 1; 32 > u; u++) _.find(".j_d_" + u).removeClass(function(n, e) {
					var i = e.split(" ");
					return i.shift(), i.join(" ")
				}).tbattr({
					title: ""
				});
				for(var m = 0; 7 > m; m++) _.find(".j_1_" + m + ", .j_5_" + m + ", .j_6_" + m).html("&nbsp;").addClass("emptyDate");
				for(var p = 1, m = d, u = 1; c > 0; m++, c--, u++) 7 == m && (m = 0, p++), 5 == p && _.find(".j_5").css({
					display: ""
				}), 6 == p && _.find(".j_6").css({
					display: ""
				}), _.find(".j_" + p + "_" + m).addClass("j_d_" + u).html(u).removeClass("emptyDate");
				this.sign_year = e, this.sign_month = i, "undefined" != typeof n && "" != n ? (t(n), a(n)) : $.tb.get(this.get_url, {
					kw: $.tb.escapeHTML(PageData.forum.forum_name),
					ie: "utf-8",
					sign_y: e,
					sign_m: i
				}, function(n) {
					return n && 0 == n.no ? (t(n), o.setReplenishInfo(n), a(n), void 0) : (alert(n.no), void 0)
				}, "json"), String(i).length < 2 && (i += "", i = "0" + i);
				var h = e + "\u5E74" + i + "\u6708";
				if(_.find(".j_calendar_month").html(h), this.sign_month == this.orign_month && this.sign_year == this.orign_year) {
					var f = _.find(".j_d_" + new Date(Env.server_time).getDate());
					if(f.hasClass("signed_day") || f.hasClass("signed_mob_day") || f.hasClass("signed_member"));
					else {
						var b = $(".j_signin_index").html();
						f.addClass("signed_day").tbattr({
							title: "\u4E8E" + new Date(Env.server_time).getHours() + "\u70B9" + new Date(Env.server_time).getMinutes() + "\u5206\uFF0C\u7B2C" + b + "\u4E2A\u7B7E\u5230\uFF0C\u7B7E\u5230\u7ECF\u9A8C+2\uFF0C\u8FDE\u7EED\u7B7E\u5230+4"
						})
					}
				}
			},
			setReplenishSignGuide: function(n) {
				if(!this.$guide_mask) {
					this.$guide_mask_close = $('<div class="rpln_guide_close">X</div>'), this.$guide_mask = $('<div class="rpln_guide">'), this.$guide_text = $('<div class="rpln_guide_txt">');
					var e = this.jq_wrap.find(".sign_succ_calendar");
					this.$guide_text.css("top", 26 * (n + 1)), e.prepend(this.$guide_text).prepend(this.$guide_mask).prepend(this.$guide_mask_close), this.$guide_mask_close.on("click", $.proxy(this.delReplenishSignGuide, this))
				}
			},
			delReplenishSignGuide: function() {
				this.$guide_mask_close && this.$guide_mask_close.remove(), this.$guide_mask && this.$guide_mask.remove(), this.$guide_text && this.$guide_text.remove()
			},
			getEnvInitialTime: function() {
				var n = new Date(Env.server_time);
				return n.setHours(0), n.setMinutes(0), n.setSeconds(0), n
			},
			replenishSign: function(n) {
				var e, i, s, t, a, _, r, o, l = this;
				if(e = parseInt(n.text()), i = new Date(this.sign_year, this.sign_month - 1, e), s = l.getEnvInitialTime(), t = (s - i) / 864e5, a = 0, 2 >= t) a = 1;
				else if(10 >= t) a = 2;
				else if(20 >= t) a = 3;
				else {
					if(!(30 >= t)) throw "\u53EF\u7B7E\u5230\u5929\u6570\u4E0D\u5E94\u5927\u4E8E30\u5929";
					a = 4
				}
				if(l.rplnBubble && l.rplnBubble.closeBubble(), $.isNumeric(e) && !(i > s - 864e5)) {
					var g = {
						arrow_dir: "down",
						bubble_css: {
							top: -50,
							left: -61,
							width: 143,
							height: 53
						},
						arrow_pos: {
							left: 70
						},
						wrap: n,
						closeBtn: !1
					};
					o = {
						top: -19,
						left: -34,
						width: 110,
						height: 20
					}, buy_arrow_pos = {
						left: 54
					}, _ = '<div class="rpln_tip">\u8865\u7B7E\u672C\u6B21\u9700\u6D88\u8017<span class="rpln_card_needed_count">' + a + '\u5F20</span>\u8865\u7B7E\u5361<br><a rel="noreferrer" class="yes_btn">\u786E\u5B9A</a><a rel="noreferrer" class="cancel_btn">\u53D6\u6D88</a></div>', r = '<div class="rpln_tip">\u8FD8\u9700\u8981' + parseInt(a - this.resign_card_num) + '\u5F20\u8865\u7B7E\u5361\uFF0C\u53BB<a rel="noreferrer" target="_blank" class="tbmall_link" href="/tbmall/propslist?category=108">\u5546\u57CE\u8D2D\u4E70\u5427</a>>></div>', $.browser.mozilla && (g.wrap = n.children(".mozilla_td_hack"), g.bubble_css.top = -74, o.top = -43), this.resign_card_num >= a ? g.content = _ : (g.content = r, g.bubble_css = o, g.arrow_pos = buy_arrow_pos), l.rplnBubble = new UiBubbleTipBase(g), l.rplnBubble.j_bubble.on("click", ".yes_btn", function() {
						l.isReplenishing || (l.isReplenishing = !0, $.tb.post("/sign/resign", {
							kw: $.tb.escapeHTML(PageData.forum.forum_name),
							tbs: PageData.tbs,
							ie: "utf-8",
							sign_y: l.sign_year,
							sign_m: l.sign_month,
							sign_d: e
						}, function(e) {
							l.isReplenishing = !1, n.removeClass("unsigned_day_hover"), e ? 0 == e.no || 2280002 == e.no ? (n.removeClass("unsigned_day unsigned_day_hover").addClass("signed_rpln_anime"), l.rplnBubble.closeBubble(), PageData.user.is_like && !PageData.user.is_block && (n.append('<div style="position:absolute;"><div class="sign_plus">+' + 5 * a + " \u7ECF\u9A8C</div></div>"), n.find(".sign_plus").show().animate({
								opacity: 0,
								top: "-=20"
							}, 2500, function() {
								$(this).parent().remove()
							})), n.tbattr("title", "\u4E8E" + (new Date(Env.server_time).getMonth() + 1) + "\u6708" + new Date(Env.server_time).getDate() + "\u65E5\u8865\u7B7E\u6210\u529F\uFF0C\u8865\u7B7E\u7ECF\u9A8C+" + 5 * a), l.sign_load_month(0, l.sign_year, l.sign_month)) : (l.rplnBubble && l.rplnBubble.closeBubble(), g.content = l._resignMap[e.no] || "\u54CE\u5440~\u670D\u52A1\u5668\u6253\u76F9\u4E86\uFF0C\u8BF7\u7A0D\u540E\u518D\u8BD5~", g.bubble_css = o, g.arrow_pos = buy_arrow_pos, l.rplnBubble = new UiBubbleTipBase(g), l.rplnBubble.showBubble()) : (l.rplnBubble && l.rplnBubble.closeBubble(), g.content = "\u54CE\u5440~\u670D\u52A1\u5668\u6253\u76F9\u4E86\uFF0C\u8BF7\u7A0D\u540E\u518D\u8BD5~", g.bubble_css = o, g.arrow_pos = buy_arrow_pos, l.rplnBubble = new UiBubbleTipBase(g), l.rplnBubble.showBubble())
						}))
					}).on("click", ".cancel_btn", function() {
						n.removeClass("unsigned_day_hover"), l.rplnBubble.closeBubble()
					}), l.rplnBubble.showBubble()
				}
			},
			pvLog: function() {
				$("#sign_music_rank").on("click", function() {
					$.stats.track("music_rank", "\u7B7E\u5230")
				})
			},
			signShai: function(n) {
				var e = this,
					i = null != navigator.userAgent.match(/iPad/i);
				void 0 == document.createElement("canvas").getContext || $.browser.mozilla || "frs" != PageData.product || i || _.Module.use("frs/component/SignShai", ["sign_mod", n.data.sign_user_info], function(n) {
					n.bind("startRender", function() {
						e.cal_mouseEventRemove()
					}), n.bind("completeRender", function() {
						e.cal_mouseEnterOut()
					})
				})
			},
			sign_100: function(n) {
				if(n) {
					var e = new Date,
						i = e.getFullYear() + "\u5E74" + (e.getMonth() + 1) + "\u6708" + e.getDate() + "\u65E5",
						s = "";
					s = "<div class='sign_100_dlg'><div class='sign_100_" + n.continueSign + "'></div><div class='sign_100_text'><div class='sign_100_close'></div><div class='sign_100_title'>\u4EB2\u7231\u7684" + n.username + "</div>", s = 100 == n.continueSign ? s + "<div class='sign_100_content'>\u4ECA\u5929\u662F\u4F60\u5728\u54B1\u4EEC<span class='sign_baname_highlight'>" + n.forumname + "</span>\u5427\u7B7E\u5230\u7684<span class='rank_number'>\u7B2C" + n.continueSign + "\u5929</span>\uFF0C\u503C\u5F97\u7EAA\u5FF5\u7684\u65E5\u5B50\uFF0C\u6709\u6728\u6709\uFF01<br/>\u65F6\u95F4\u8FC7\u5F97\u771F\u5FEB\u54C8\uFF0C\u4ECE\u7B2C\u4E00\u6B21\u7B7E\u5230\u5230\u73B0\u5728\uFF0C\u5DF2\u6709" + n.continueSign + "\u4E2A\u503C\u5F97\u56DE\u5473\u7684\u65E5\u65E5\u591C\u591C\u5728\u8FD9\u91CC\u7559\u5B58\u3002<br/>\u8BA9\u6211\u4EEC\u611F\u5230\u5F00\u5FC3\u7684\u662F\uFF0C\u4F60\u4ECD\u7136\u662F\u54B1\u4EEC<span class='sign_baname_highlight'>" + n.forumname + "</span>\u5427\u7684" + n.memberCount + "\u4E2A<span class='sign_baname_highlight'>" + n.memberTitle + "</span>\u4E2D\u575A\u5B9E\u7684\u4E00\u4EFD\u5B50\u3002<br/>\u4ECA\u5929\uFF0C\u7B7E\u5230" + n.continueSign + "\u5929\uFF1B\u6B64\u540E\uFF0C\u8BA9\u6211\u4EEC\u4F9D\u7136\u5171\u540C\u6210\u957F\uFF0C\u5E76\u5FEB\u4E50\u3002<br/></div>" : s + "<div class='sign_100_content'>\u77E5\u9053\u5417\uFF0C\u4ECA\u5929\u662F\u4F60\u5728\u54B1\u4EEC<span class='sign_baname_highlight'>" + n.forumname + "</span>\u5427\u7B7E\u5230\u7684<span class='rank_number'>\u7B2C" + n.continueSign + "\u5929</span>\uFF0C\u6574\u6574\u4E00\u4E2A\u6708\u5566\uFF01<br/>\u65F6\u95F4\u8FC7\u5F97\u633A\u5FEB\u7684\u54C8\uFF0C\u4ECE\u4F60\u7B2C\u4E00\u6B21\u5230\u672C\u5427\u7B7E\u5230\uFF0C\u70B9\u4E0E\u4E0D\u70B9\u95F4\uFF0C\u5728\u8D34\u5427\u5EA6\u8FC7\u4E86" + n.continueSign + "\u4E2A\u7F8E\u597D\u7684\u65E5\u5B50\u3002<br/>\u4ECA\u540E\u7684\u8DEF\u8FD8\u957F\u7740\u5462\uFF0C\u8877\u5FC3\u5E0C\u671B\u4F60\u5728<span class='sign_baname_highlight'>" + n.forumname + "</span>\u5427\u7684\u6BCF\u4E00\u5929\u90FD\u80FD\u5F00\u5FC3\uFF0C\u4E0E\u5168\u4F53\u5427\u53CB\u4EEC\u76F8\u77E5\u76F8\u7231\u3002<br/>\u4ECA\u5929\uFF0C\u7B7E\u5230\u6EE1\u6708\uFF1B\u6B64\u540E\uFF0C\u8BA9\u6211\u4EEC\u4F9D\u7136\u5171\u540C\u6210\u957F\u3002<br/></div>", s = s + "<div class='sign_100_message'><a rel='noreferrer' href='/i/sys/jump?un=%CC%F9%B0%C9%C7%A9%B5%BD%D0%A1%C3%D8%CA%E9' target='_blank'>\u8D34\u5427\u7B7E\u5230\u5C0F\u79D8\u4E66</a><img src='//tb2.bdstatic.com/tb/img/itieba_vip.gif' title='\u8D34\u5427\u5B9E\u540D\u8BA4\u8BC1' class='verified_icon'>&nbsp;&nbsp;&nbsp;&nbsp;" + i + "&nbsp;&nbsp;&nbsp;&nbsp;<button class='j_sign_100_shai sign_100_shai_btn'>&nbsp;</button></div></div></div>";
					var t = new $.dialog({
						html: s,
						holderClassName: "sign_100_wapper",
						width: "681",
						showTitle: !1
					});
					$(t.element[0]).find(".sign_100_close").click(function() {
						t.close()
					});
					var a = null != navigator.userAgent.match(/iPad/i);
					void 0 == document.createElement("canvas").getContext || $.browser.mozilla || "frs" != PageData.product || a || ($(".j_sign_100_shai").show(), _.Module.use("ucenter/component/sign100", ["dialogJbody", n.continueSign], function(n) {
						n.bind("completeRender", function() {
							t.close()
						})
					}))
				}
			},
			sign_right_tips: function(n) {
				var e = [PageUnit.load("sign_mod_tiptitle1"), PageUnit.load("sign_mod_tiptitle2"), PageUnit.load("sign_mod_tiptitle3"), PageUnit.load("sign_mod_tiptitle4"), PageUnit.load("sign_mod_tiptitle5")],
					i = [PageUnit.load("sign_mod_tiptext1"), PageUnit.load("sign_mod_tiptext2"), PageUnit.load("sign_mod_tiptext3"), PageUnit.load("sign_mod_tiptext4"), PageUnit.load("sign_mod_tiptext5")],
					s = [PageUnit.load("sign_mod_tipcondition1"), PageUnit.load("sign_mod_tipcondition2"), PageUnit.load("sign_mod_tipcondition3"), PageUnit.load("sign_mod_tipcondition4"), PageUnit.load("sign_mod_tipcondition5")];
				$(".j_sign_rights").css("position", "relative").css("z-index", "1");
				var t = [43, 77, 114, 145, 175],
					a = n + 1,
					_ = {
						icon: "sign_big_icon_" + a,
						title: e[n],
						text: i[n],
						condition: s[n],
						position_right: 13,
						arr_right: t[n]
					},
					r = {
						content: "<div class='sign_rights_tip'><div class='sign_rights_top clearfix'><div class='sign_rights_big_icon " + _.icon + "'></div><div class='sign_rights_text_wapper'><div class='sign_rights_title'>" + _.title + "</div><div class='sign_rights_title_text'>" + _.text + "</div></div></div><div class='sign_rights_popline'></div><div class='sign_rights_condition'>" + _.condition + "</div></div>",
						arrow_dir: "up",
						bubble_css: {
							top: 35,
							right: _.position_right,
							width: 250,
							"z-index": 9999
						},
						arrow_pos: {
							left: _.arr_right
						},
						attr: " ",
						wrap: $(".j_sign_rights"),
						closeBtn: !1
					};
				if(null === this.rights_tips[n]) {
					var o = new UiBubbleTipBase(r);
					o.showBubble(), this.rights_tips[n] = o
				} else this.rights_tips[n].showBubble()
			},
			check_rights_status: function(n) {
				$(".j_sign_rights_icon:eq(0)").addClass("rights_get"), n >= 2 && $(".j_sign_rights_icon:eq(1)").addClass("rights_get"), n >= 10 && $(".j_sign_rights_icon:eq(2)").addClass("rights_get"), n >= 20 && $(".j_sign_rights_icon:eq(3)").addClass("rights_get"), n >= 30 && $(".j_sign_rights_icon:eq(4)").addClass("rights_get")
			}
		}
	}
});
_.Module.define({
	path: "user/widget/tbSpam",
	requires: [],
	sub: {
		initial: function() {
			$("body").append($("#tb_spam_notice_html").html())
		}
	}
});
_.Module.define({
	path: "user/widget/myTieba",
	requires: ["common/widget/wallet_dialog", "common/widget/Card", "common/widget/tcharge_dialog"],
	sub: {
		config: {
			url: {
				dolike: "/f/like/commit/add",
				undolike: "/f/like/commit/delete",
				closetip: "/f/like/commit/notice/delete"
			}
		},
		initial: function(e) {
			var i = this,
				t = e || {};
			i.user = PageData.user, i.forum = PageData.forum, i.balvInfo = t.balvInfo, i.style = t.style || "", i.isBySys = t.isBySys || !0, i.scoreTip = null, i.daysTofree = 0, i.block_bubble = null, i.product = t.product || null
		},
		init: function() {
			var e = this;
			e.user.forbidden ? e.daysTofree = e.user.forbidden.days_to_free : e.user.balv && (e.daysTofree = e.user.balv.days_tofree), -1 != $.inArray(e.product, ["frs", "pb"]) && (_.Module.use("ueglibs/widget/Ban", [], function(i) {
				e.BanLib = i
			}), this.user.is_login && e.showOfflineCard()), this.user.is_login && (this.bindEvents(), $(".user_profile .sign_highlight").length > 0 && this.show_orange_tip(), this.showNewpropsTip()), this.dolikeEvent()
		},
		showOfflineCard: function() {
			var e = this,
				i = 1 * new Date;
			i > 1408032e6 || $.tb.Storage.get("balv_tdou_update") > i || (this.offline_card = this.use("common/widget/Card", {
				content: '<span style="cursor:pointer;position: absolute;width: 10px; height: 10px; right: 5px; top: 6px;" class="j_close"></span><a target="_blank" class="j_link" href="/p/3199708402"><img style="margin: 4px 4px 0;" src="//tb1.bdstatic.com/tb/static-ucenter/img/offline1.png"></a>',
				clazz: "doupiao_offline",
				arrow_dir: "left",
				card_css: {
					width: 172,
					"z-index": 1010,
					left: 198,
					top: 9
				},
				arrow_pos: {
					left: -7,
					top: 20
				},
				wrap: $(".user_profile"),
				card_leave_display: !0
			}), this.offline_card._j_card.on("click", ".j_close", function() {
				$.tb.Storage.set("balv_tdou_update", i + 864e5), e.offline_card._j_card.remove()
			}).on("click", ".j_link", function() {
				$.tb.Storage.set("balv_tdou_update", i + 864e5), e.offline_card._j_card.remove()
			}), this.offline_card.showCard())
		},
		bindEvents: function() {
			var e = this;
			if($("#user_info").on("click", ".j_score_num", function(i) {
					i.preventDefault(), e.requireInstance("common/widget/wallet_dialog").show()
				}), $(".userliked_ban_content").on("click.bawuAppealLink", ".j_appealLink", function() {
					$.stats.track("balvAppealLink", "uegCount", "bawuAppeal", "click")
				}), $(".userlike_blacked").bind("mouseover", function() {
					e.show_black_tip($(this))
				}), $(".userlike_prisoned").bind("mouseover", function() {
					e.daysTofree > 0 && e.daysTofree < 360 ? e.show_shortblock_tip($(this), e.daysTofree, e.isBySys ? "\u7CFB\u7EDF" : "\u5427\u4E3B", e.isBySys ? "system" : "bawu") : e.show_block_tip($(this))
				}), $("body").delegate(".tbmall_tip_close", "click", function() {
					return $("#tbmall_tip_card").remove(), e.tbmallTip = null, $.cookie("close_tbmall_tip", "1", {
						expires: 365
					}), !1
				}), $("#j_tcharge_dialog").on("click", function() {
					$.stats.track(e.formatForm(), "\u4F1A\u5458\u5B98\u7F51\u7EDF\u8BA1"), e.use("common/widget/tcharge_dialog")
				}), this.user.balv && this.user.balv.has_liked || this.user.is_like)
				if(PageData.is_ipad) $("a.p_balv_btnmanager").show();
				else {
					var i = $(".p_balv_btnmanager");
					$(".my_tieba_mod").hover(function() {
						i.show()
					}, function() {
						i.hide()
					})
				}
			$("#my_tieba_mod").find(".user_name").find(".icon_tbworld").on("click", function() {
				switch(e.product) {
					case "frs":
						e._postTrack("\u7687\u51A0", "\u4F1A\u5458\u5065\u5EB7\u7EDF\u8BA1", "click", {
							obj_name: "FRS\u6211\u5728\u8D34\u5427\u7687\u51A0\u70B9\u51FB"
						});
						break;
					case "pb":
						e._postTrack("\u7687\u51A0", "\u4F1A\u5458\u5065\u5EB7\u7EDF\u8BA1", "click", {
							obj_name: "PB\u53F3\u4FA7\u6211\u5728\u8D34\u5427\u7687\u51A0\u70B9\u51FB"
						});
						break;
					case "index":
						e._postTrack("\u7687\u51A0", "\u4F1A\u5458\u5065\u5EB7\u7EDF\u8BA1", "click", {
							obj_name: "\u9996\u9875\u5DE6\u4FA7\u6211\u5728\u8D34\u5427\u7687\u51A0\u70B9\u51FB"
						})
				}
			})
		},
		formatForm: function() {
			var e = this,
				i = "";
			return i = e.product ? e.product : e.urlFormat(), i + "\u83B7\u53D6T\u8C46"
		},
		urlFormat: function() {
			return location.href.split("/").pop()
		},
		dolikeEvent: function() {
			var e = this;
			$(".balv_dolike_comforum,.balv_dolike_star").bind("click", function() {
				return e.user.is_login ? e.user.balv && e.user.balv.is_block || e.user.forbidden && e.user.forbidden.isForbid ? e.showAlert(e.BanLib.render("balvLike")) : e.user.balv && e.user.balv.is_black || e.user.is_black ? e.showAlert("\u4F60\u88AB\u5427\u4E3B\u52A0\u5165\u672C\u5427\u9ED1\u540D\u5355\uFF0C\u6682\u65F6\u4E0D\u80FD\u8FDB\u884C\u64CD\u4F5C") : e.dolike() : _.Module.use("common/widget/LoginDialog", ["", "ilike"]), !1
			})
		},
		showAlert: function(e) {
			var i = '<div style="padding:20px 20px; text-align:cente; line-height:20px;font-size:13px;">' + e + "</div>";
			$.dialog.open(i, {
				title: "\u64CD\u4F5C\u5931\u8D25",
				width: 380
			})
		},
		howtojoin: function() {
			$.dialog.alert("<div style='padding:20px;line-height:30px;padding-bottom:0px;'>\u70B9\u51FB\u53F3\u4FA7\u4E0A\u65B9\u201C<img align='absmiddle' src='" + PageData.staticDomain + "tb/static-member/img/whatlevel.png'></img>\u201D<br/>\u5373\u53EF\u52A0\u5165\u672C\u5427\uFF0C\u70B9\u4EAE\u5934\u8854\uFF0C\u4ECE\u521D\u7EA7\u7C89\u4E1D\u5F00\u59CB\u6210\u957F\uFF01</div>", {
				title: "\u5982\u4F55\u52A0\u5165",
				width: 325
			})
		},
		dolike: function() {
			var e = this;
			if(this.user.is_login && this.user.no_un) return TbCom.process("User", "buildUnameFrame", "\u586B\u5199\u7528\u6237\u540D", "\u6709\u7528\u6237\u540D\u624D\u80FD\u70B9\u4EAE\u201C\u6211\u5173\u6CE8\u201D\uFF0C\u8D76\u5FEB\u7ED9\u81EA\u5DF1\u8D77\u4E00\u4E2A\u5427~"), !1;
			var i = {
				fid: this.forum.forum_id,
				fname: $.tb.escapeHTML(this.forum.forum_name),
				uid: this.user.name_url,
				ie: "gbk",
				tbs: PageData.tbs
			};
			$.post(this.config.url.dolike, i, function(i) {
				if(i && 0 == i.no) _.Module.use("ucenter/widget/LikeTip", ["", !1, {
					index: i.data.ret.index,
					like_no: i.like_no
				}]);
				else {
					var t = "";
					t = 8 == i.no || 9 == i.no ? e.BanLib.render("balvLike") : 220 == i.no ? "\u4F60\u88AB\u5427\u4E3B\u52A0\u5165\u9ED1\u540D\u5355\uFF0C\u6682\u65F6\u4E0D\u80FD\u8FDB\u884C\u64CD\u4F5C" : 221 == i.no ? "\u4F60\u5DF2like\u4E86\u672C\u5427,\u8BF7\u4E0D\u8981\u91CD\u590D\u64CD\u4F5C" : "\u62B1\u6B49\uFF0C\u5F02\u5E38\u9519\u8BEF\uFF0C\u5EFA\u8BAE\u5237\u65B0\u9875\u9762\u91CD\u8BD5\u4E00\u4E0B", e.showAlert(t)
				}
			}, "json")
		},
		undolike: function() {
			var e = {
				fid: this.forum.forum_id,
				fname: $.tb.escapeHTML(this.forum.forum_name),
				uid: this.user.name_url,
				ie: "utf-8",
				tbs: PageData.tbs
			};
			$.tb.post(this.config.url.undolike, e, function(e) {
				e && 0 == e.no && $.tb.location.reload(!0)
			})
		},
		show_shortblock_tip: function(e) {
			this.block_render(e, this.BanLib.render("balvAside"))
		},
		show_block_tip: function(e) {
			this.block_render(e, this.BanLib.render("balvAside"))
		},
		show_black_tip: function(e) {
			var i = new Array;
			i.push("<div style='width:180px;text-align:left;margin:6px 0px 6px 10px;'>"), i.push("<span>\u4F60\u5DF2\u88AB\u5427\u4E3B\u62C9\u5165\u9ED1\u540D\u5355\uFF0C</span></br><span>\u4F60\u5728\u672C\u5427\u7684\u5934\u8854\u548C\u6743\u9650\u4E5F\u88AB\u6536\u56DE\u3002</span>"), i.push("</div>"), this.block_render(e, i.join(""))
		},
		show_lvup_tip: function(e, i) {
			var t = this,
				o = new Array;
			if(o.push("<div class='lvup_tip_container'>"), o.push("<div class='lvlup_con_msg'>\u5347\u7EA7\u5566!\u4F60\u5DF2\u62E5\u6709\u672C\u5427" + e + "\u7EA7\u5934\u8854!</div>"), o.push('<div class="lvlup_pop_rights">' + i + "</div>"), "\u52A0\u6CB9~\u7EE7\u7EED\u6512\u7ECF\u9A8C\uFF01" == i) o.push("<a style='float:left;' href='/f/like/level?kw=" + this.forum.name_url + "' target='_blank'>\u67E5\u770B\u5347\u7EA7\u79D8\u7B08</a>");
			else {
				var s = 'Stats.sendRequest("fr=tb0_forum&st_mod=frs&st_type=balvupguide&lv=' + e + '")';
				o.push("<a href='#sub' style='float:left;' onclick='rich_postor.jumpToTry(" + e + ");" + s + "'>\u73B0\u5728\u53BB\u8BD5\u8BD5~~</a>")
			}
			o.push("</div>");
			var l = o.join(""),
				n = {
					content: l,
					arrow_dir: "up",
					bubble_css: {
						top: 4,
						right: -5,
						width: 232,
						"z-index": 9999
					},
					arrow_pos: {
						left: 209
					},
					attr: "lvup_tip_table",
					wrap: $("#userlike_info_tip"),
					closeBtn: !0
				},
				r = new UiBubbleTipBase(n);
			r.j_bubble.find(".j_content").css("padding", "2px").addClass("lvup_tip_table"), r.showBubble(), r.bind("onclose", function() {
				t.close_lvup_tip()
			}, !0), this.user.is_block || setTimeout(function() {
				r.closeBubble(), t.close_lvup_tip()
			}, 8e3)
		},
		block_render: function(e, i) {
			if(!this.block_bubble) {
				var t = this,
					o = {
						content: i,
						arrow_dir: "up",
						bubble_css: {
							top: 36,
							right: 4,
							width: 232,
							"z-index": 9999
						},
						arrow_pos: {
							left: 209
						},
						attr: "",
						wrap: e,
						closeBtn: !0
					};
				this.block_bubble = new UiBubbleTipBase(o), this.block_bubble.j_bubble.find(".j_content").css("padding", "2px"), this.block_bubble.showBubble(), this.block_bubble.bind("onclose", function() {
					t.block_bubble.closeBubble(), t.block_bubble = null
				}); {
					setTimeout(function() {
						t.block_bubble && (t.block_bubble.closeBubble(), t.block_bubble = null)
					}, 5e3)
				}
			}
		},
		close_lvup_tip: function() {
			var e = {
				fid: this.forum.forum_id,
				fname: this.forum.name_url,
				uid: this.user.name_url,
				ie: "utf-8",
				tbs: PageData.tbs,
				type: 2
			};
			$.tb.post(this.config.url.closetip, e, function(e) {
				e && 0 == e.no
			})
		},
		show_orange_tip: function() {
			if("false" != $.cookie("close_sign_tip_o")) {
				$.cookie("close_sign_tip_o", !0, {
					expires: 14
				});
				var e = {
						content: "\u8FDE\u7EED\u7B7E\u523030\u5929ID\u5373\u53EF\u9AD8\u4EAE\u5C55\u793A\uFF0C\u4E00\u8D77\u95EA\u8000\u5427\uFF01",
						arrow_dir: "down",
						bubble_css: {
							top: 3,
							right: 25,
							width: 145,
							"z-index": 9999
						},
						arrow_pos: {
							left: 88
						},
						attr: " ",
						wrap: $(".user_profile .user_name"),
						closeBtn: !0
					},
					i = new UiBubbleTipBase(e);
				i.j_bubble.find(".j_body").css("padding-right", "3px"), i.showBubble(), i.bind("onclose", function() {
					$.cookie("close_sign_tip_o", !1, {
						expires: 14
					})
				}, !0); {
					setTimeout(function() {
						$(".j_wrap .j_close").click()
					}, 8e3)
				}
			}
		},
		showNewpropsTip: function() {
			var e = $.cookie("NEWS_PROPS_NOTICE"),
				i = this.user.global && this.user.global.tbmall_newprops || "";
			(!e && i > 0 || e && i > e) && this.buildNewpropsTip()
		},
		buildNewpropsTip: function() {
			var e = this,
				i = {
					content: '<a class="j_newprops_tip" href="/tbmall/home?sn=1" target="_blank" style="text-align:center;display:block;">\u6709\u65B0\u9053\u5177\u4E0A\u7EBF\u54E6~</a>',
					arrow_dir: "up",
					arrow_pos: {
						left: 40
					},
					bubble_css: {
						top: -35,
						left: 100,
						width: 100
					},
					wrap: $("#j_profile_pop"),
					closeBtn: !0
				},
				t = new UiBubbleTipBase(i),
				o = "";
			t.bind("onclose", function() {
				t.closeBubble(), o = e.user.global && e.user.global.tbmall_newprops || "", $.cookie("NEWS_PROPS_NOTICE", o, {
					expires: 30,
					path: "/"
				})
			}), t.showBubble(), t.j_bubble.find(".j_newprops_tip").on("click", function() {
				$.post("/tbmall/post/addpropstoucenter", null, function() {}), t.closeBubble(), o = e.user.global && e.user.global.tbmall_newprops || "", $.cookie("NEWS_PROPS_NOTICE", o, {
					expires: 30,
					path: "/"
				})
			})
		},
		hasLevel: function() {
			var e = Math.floor((new Date).getTime() / 1e3);
			return this.user.Parr_props && this.user.Parr_props.level && this.user.Parr_props.level.end_time > e
		},
		_postTrack: function(e, i, t, o) {
			t = t || "click", o = o || {}, $.stats.track(e, i, "", t, o)
		}
	}
});
_.Module.define({
	path: "user/widget/icon_tip",
	requires: ["common/widget/Tdou/TdouViewPay", "common/widget/Card"],
	sub: {
		_icon_tip: null,
		_icon_tip_ajax: null,
		_dialog: null,
		_iconData: {},
		_option: {
			width: 300
		},
		initial: function(t) {
			this.pageType = t.pageType, this.myIcons = t.myIcons, this.bindEvents()
		},
		bindEvents: function() {
			var t = this,
				i = $("body");
			i.find(".j_icon_slot").on("mouseenter", function() {
				t._icon_tip && t._icon_tip.closeCard(), t.buildCard($(this))
			}).on("mouseleave", function() {
				t._icon_tip && t._icon_tip.closeCard({
					type: "delayClose",
					time: 200
				}), t._icon_tip = null
			}), i.on("click", ".j_buy_icon_btn", function(i) {
				i.preventDefault(), t.getOneIcon(t._iconData)
			}).on("click", ".j_manage_icon_btn", function(i) {
				i.preventDefault(), t.jumpToIhome()
			})
		},
		buildCard: function(t) {
			var i = this;
			i._icon_tip && (i._icon_tip.closeCard(), i._icon_tip = null);
			var n = t.getData();
			this._iconData = n;
			var e, a, o, r, c, l, _ = _ || 1,
				s = 50,
				p = "//tb1.bdstatic.com/tb/cms/com/icon/";
			if(n.sprite) {
				if(e = n.sprite[n.value], !e)
					for(var u in n.sprite)
						if(n.sprite[u] && (0 != n.value || "meizhi_level" == n.name)) {
							e = n.sprite[u];
							break
						}
				a = e.split(","), o = a[0], r = a[1], l = p + n.category_id + "_36.png?stamp=" + o, c = 'style="background: url(' + l + ") no-repeat -" + r * s + "px  -" + (_ - 1) * s + 'px;"'
			} else c = t.css("background");
			var d = this.getIconTipHtml(n);
			if(!d) return !1;
			null == n.title && (n.title = t.tbattr("title"));
			var g = ['<div class="icon_tip_wrapper">', '<div class="icon_tip_img" ' + c + " />", '<div class="icon_tip_info">', '<div class="icon_tip_title">' + n.title + (d.expired ? d.expired : "") + "</div>", '<div class="icon_tip_intro">' + d.intro + "</div>", '<div class="icon_tip_btns">', d.btn, "</div>", "</div>", "</div>"].join(""),
				f = {
					content: g,
					card_css: {
						width: i._option.width,
						zIndex: $.getcurzIndex()
					},
					auto_positon: !0,
					event_target: t,
					attr: "id='icon_tip'",
					wrap: $("body")
				};
			i._icon_tip = i.requireInstance("common/widget/Card", f), i._icon_tip.showCard({
				type: "delayShow",
				time: 200
			})
		},
		redirect: function(t, i, n) {
			t = t || {}, t.from = i, t.chargeType = "platform";
			var e = this;
			e.payment = e.requireInstance("common/widget/Tdou/TdouViewPay", function(t) {
				"encourage_paid" === t.command && "success" === $.getPageData("data.error", "error", t) && n(t)
			}), e.payment.createMain(t)
		},
		getOneIcon: function(t) {
			var i = this,
				n = t.name;
			if(n) {
				var e = $.dialog.confirm("\u786E\u5B9A\u8D2D\u4E70\u3010" + t.title + "\u3011\u5370\u8BB0\u561B\uFF1F\u5C06\u6D88\u8017\u60A8" + t.price + "T\u8C46", {
					title: "\u8D2D\u4E70\u5370\u8BB0\u63D0\u793A",
					acceptValue: "\u786E\u5B9A",
					cancelValue: "\u53D6\u6D88"
				});
				e.bind("onaccept", function(t) {
					t.stopImmediatePropagation();
					var e = {
						ie: "utf-8"
					};
					e.tbs = PageData.tbs, e.icon_name = n, e.level = 1, i._icon_tip_ajax && i._icon_tip_ajax.abort(), i._icon_tip_ajax = $.ajax({
						type: "post",
						url: "/icon/buyIcon",
						data: e,
						dataType: "json"
					}).then(function(t) {
						t && 0 === t.no ? i.redirect(t.data, "\u5370\u8BB0\u4E2D\u5FC3TIP", function() {
							i.showDialog("\u8D2D\u4E70\u6210\u529F"), $.tb.location.reload()
						}) : t && 2270028 === t.no ? i.showDialog("T\u8C46\u4E0D\u8DB3") : i.showDialog("\u8D2D\u4E70\u51FA\u9519\uFF0C\u6CA1\u6709\u8D2D\u4E70\u6210\u529F")
					}, function() {
						i.showDialog("\u7F51\u7EDC\u9519\u8BEF, \u8BF7\u7A0D\u5019\u518D\u8BD5")
					})
				})
			}
		},
		getIconTipHtml: function(t) {
			if(null == t.intro || null == t.intro_url) return !1;
			if(this.whetherIHaveTheIcon(t, this.myIcons)) return {
				intro: "<p>" + t.intro + ' <a target="_blank" href="' + t.intro_url + '">\u8BE6\u60C5\u300B</a></p>',
				btn: '<a class="btn_default btn_small j_manage_icon_btn " href="" target="_blank" >\u7BA1\u7406\u5370\u8BB0</a>'
			};
			if(null != t.price && 0 != t.price) {
				var i = '<p>\u4EF7\u683C:<i class="icon_tbean" style="vertical-align:middle;"></i><span class="orange_text " >' + t.price + '</span> <a target="_blank" href="' + t.intro_url + '">\u8BE6\u60C5\u300B</a></p>';
				return {
					intro: i,
					btn: '<a class="btn_default btn_small j_buy_icon_btn"  >\u8D2D\u4E70\u5370\u8BB0</a>'
				}
			}
			return {
				intro: "<p>" + t.intro + ' <a target="_blank" href="' + t.intro_url + '">\u8BE6\u60C5\u300B</a></p>',
				btn: '<a class="btn_default btn_small" target="_blank" href="' + t.intro_url + '" >\u83B7\u53D6\u5370\u8BB0</a>'
			}
		},
		jumpToIhome: function() {
			var t = $(".userinfo_honor"),
				i = t.find(".j_icon_slot");
			$.tb.location.getHref().match("/home/") && t && i ? i.first().trigger("click") : window.open("/home/main?id=" + PageData.user.portrait + "&fr=icon_tip#manage_icon")
		},
		whetherIHaveTheIcon: function(t, i) {
			var n, e;
			for(e in i)
				if(n = i[e], t.name == n) return !0;
			return !1
		},
		showDialog: function(t) {
			this._dialog && this._dialog.close(), this._dialog = null, this._dialog = new $.dialog({
				title: "\u5370\u8BB0\u63D0\u793A",
				html: t
			})
		},
		formateDate: function(t) {
			var i = new Date(1e3 * parseInt(t));
			return i.getFullYear() + "-" + (i.getMonth() + 1) + "-" + i.getDate()
		}
	}
});
_.Module.define({
	path: "common/widget/Tdou/TdouViewPay",
	requires: ["common/widget/Tdou/TdouBuilder", "common/widget/Tdou/TdouData", "common/widget/Tdou/TdouViewUtil", "common/widget/Tdou/TdouViewAutoRedirect", "common/widget/Tdou/TdouViewOperationBootstrap", "common/widget/payMember"],
	sub: {
		errors: {
			110000: "\u7528\u6237\u672A\u767B\u9646",
			2320007: "\u7CFB\u7EDF\u9519\u8BEF\uFF0C\u8BF7\u7A0D\u540E\u91CD\u8BD5",
			210009: "\u7CFB\u7EDF\u9519\u8BEF\uFF0C\u8BF7\u7A0D\u540E\u91CD\u8BD5",
			2270044: "\u8D26\u53F7\u5F02\u5E38\uFF0C\u8BF7\u91CD\u65B0\u767B\u9646",
			2270047: "\u652F\u4ED8\u5931\u8D25\u2014\u8BA2\u5355\u5931\u6548",
			2270050: "\u8BA2\u5355\u72B6\u6001\u5F02\u5E38",
			2270049: "\u5546\u54C1\u8FC7\u671F\uFF0C\u8BF7\u91CD\u65B0\u8D2D\u4E70",
			2270015: "\u5546\u54C1\u4E0D\u53EF\u5151\u6362",
			2270051: "\u7CFB\u7EDF\u7EF4\u62A4\u4E2D..."
		},
		order_status: {
			0: "\u652F\u4ED8\u672A\u5B8C\u6210\uFF01",
			1: "\u652F\u4ED8\u6210\u529F\uFF0C\u5546\u54C1\u5151\u6362\u4E2D\uFF01",
			2: "\u5151\u6362\u6210\u529F",
			3: "\u5151\u6362\u5931\u8D25\uFF0CT\u8C46\u5DF2\u9000\u8FD8",
			4: "\u5151\u6362\u8D85\u65F6\uFF0C\u8BF7\u8054\u7CFB\u7BA1\u7406\u5458"
		},
		tdou_buy_confirm_tag: "tdou_buy_confirm",
		is_iframe: !0,
		initial: function(e) {
			this.builder = this.requireInstance("common/widget/Tdou/TdouBuilder"), this.dataProxy = this.requireInstance("common/widget/Tdou/TdouData"), this.viewUtil = this.requireInstance("common/widget/Tdou/TdouViewUtil"), this.message = e, this.autoDirect = this.requireInstance("common/widget/Tdou/TdouViewAutoRedirect")
		},
		createMain: function(e) {
			var o = this;
			o.notShowSucTips = e.notShowSucTips, o.dataProxy.getPayInfo(e, o.onPayInfo, o)
		},
		onPayInfo: function(e) {
			var o = this;
			if(e && 0 === e.no) {
				var t = e.data.goods_info,
					i = e.data.order_info,
					r = e.data.user_info;
				o.pay_info = {
					goods_info: t,
					order_info: i,
					user_info: r
				}, o.createUI(t, i, r)
			} else o.handleError(e.no)
		},
		createUI: function(e, o, t) {
			var i = this,
				r = "",
				n = t.Parr_props;
			i.dataProxy.setParrProps(n);
			var a = i.dataProxy.getMemberLevel(),
				d = 2 == a,
				u = t.Parr_scores,
				_ = 0;
			u && (_ = u.scores_money + u.scores_other);
			var s = _ >= e.tdou_num,
				c = 0;
			s || (c = e.tdou_num - _);
			var m = e.free_vip_level;
			if(s && (o.cpath.pay_cashier || void 0 == o.cpath.pay_cashier)) return i.pay(!1), void 0;
			if(!s && (o.cpath.gettdou_cashier || void 0 == o.cpath.gettdou_cashier)) return i.getTdou(!1), void 0;
			var l = i.confirmCount();
			return s && l > 0 ? (l -= 1, i.confirmCount(l), i.pay(!1), void 0) : (d && m ? r = i.createUI_memberGetTdou_free(s, e, o, c) : d && !m ? r = i.createUI_memberGetTdou(s, e, o, c) : !d && m ? r = i.createUI_nonMemberGetGoodsOwnedMember(s, e, o, c) : d || m || (r = i.createUI_nonMemberGetTdouOwnedMember(s, e, o, c)), i.renderMain(r), i.initUIData(), i.bindMainUIEvents(), void 0)
		},
		directToCrasher: function(e, o, t) {
			var i = this,
				r = t.Parr_props;
			i.dataProxy.setParrProps(r);
			var n = t.Parr_scores,
				a = 0;
			n && (a = n.scores_money + n.scores_other);
			var d = a >= e.tdou_num,
				u = 0;
			d || (u = e.tdou_num - a), d ? i.pay(!1) : i.getTdou(!1)
		},
		initUIData: function() {
			var e = this,
				o = e.confirmCount(),
				t = $(".j_baidu_tb_tdou_pay_info_box .j_tdou_buy_confirm");
			t.length > 0 && (parseInt(o) > 0 ? t.tbattr("checked", !0) : t.tbattr("checked", !1))
		},
		createUI_nonMemberGetGoodsOwnedMember: function(e, o, t, i) {
			o.tdou_pay_from = t.from;
			var r = this.builder.buildPayTdouMain_nonMemberGetGoodsOwnedMember(e, o, t, i);
			return r
		},
		createUI_nonMemberGetTdouOwnedMember: function(e, o, t, i) {
			o.tdou_pay_from = t.from;
			var r = this.builder.buildPayTdouMain_nonMemberGetTdouOwnedMember(e, o, t, i);
			return r
		},
		createUI_memberGetTdou: function(e, o, t, i) {
			o.tdou_pay_from = t.from;
			var r = this.builder.buildPayTdouMain_memberGetTdou(e, o, t, i);
			return r
		},
		createUI_memberGetTdou_free: function(e, o, t, i) {
			o.tdou_pay_from = t.from;
			var r = this.builder.buildPayTdouMain_memberGetTdou_freeGoods(e, o, t, i);
			return r
		},
		renderMain: function(e) {
			if(!($(".baidu_tb_tdou_payment_dialog").length > 0)) {
				var o = {
					modal: !0,
					showTitle: !1,
					fixed: !0,
					width: 610,
					height: 275,
					holderClassName: "baidu_tb_tdou_payment_dialog",
					draggable: !0
				};
				o.html = e, this._dialog = new $.dialog(o), this._dialog.element[0].id = "baidu_tb_tdou_payment_dialog", this._dialog.show()
			}
		},
		bindMainUIEvents: function() {
			var e = this;
			if(!e._dialog) return !1;
			var o = e._dialog.element;
			o.find(".j_tdou_pay_header_close").on("click", function() {
				e.closeMain(), e.sendMessage("closed", "");
				var o = e.requireInstance("common/widget/Tdou/TdouViewOperationBootstrap"),
					t = {
						actionType: "CLOSE_PAYMENT"
					};
				o.triggerByScene(t, e.pay_info)
			}), o.delegate(".j_tb_tdou_pay_btn", "click", function() {
				e.pay()
			}).delegate(".j_tb_tdou_get_tdou_btn", "click", function() {
				e.getTdou()
			}).delegate(".j_tdou_enable_member", "click", function() {
				var e = $(".j_baidu_tb_tdou_pay_info_box .j_tb_tdou_get_tdou_btn");
				$(this).tbattr("checked") ? (e.html("\u5F00\u901A\u4F1A\u5458\u5E76\u83B7\u53D6T\u8C46"), e.addClass("tdou_pay_btn_135")) : (e.html("\u83B7\u53D6T\u8C46"), e.removeClass("tdou_pay_btn_135"))
			}).delegate(".j_tdou_buy_confirm", "click", function() {
				$(this).tbattr("checked") ? e.confirmCount(30) : e.confirmCount(0)
			}).delegate(".j_tdou_buy_icon", "click", function() {
				e.getIcon()
			}).delegate(".j_tdou_open_super_member_link", "click", function() {
				e.closeMain();
				var o = e.requireInstance("common/widget/payMember"),
					t = {
						fr: "tbui_tdou_view_pay"
					};
				o.showCashier(t)
			})
		},
		pay: function(e) {
			var o = this,
				t = e;
			"undefined" == typeof e && (t = !0);
			var i = {
				no_ui: t
			};
			o.dataProxy.payGoods(o.onPay, o, i)
		},
		onPay: function(e, o) {
			var t = this;
			o && !o.no_ui ? t.wrap = null : (t.wrap = null, t.closeMain());
			var i = t.dataProxy.getPayInfoCache();
			if(0 === e.no) {
				var r = {
					from: i.order_info.from,
					goods_name: $.tb.subByte(i.goods_info.goods_name, 24, ""),
					order_status: e.data.order_info.status,
					price: i.goods_info.tdou_num
				};
				t.viewUtil.displayPaymentSuccess(t.wrap, r, function() {
					t.closeMain(), t.sendMessage("paid", e)
				}, t, t.notShowSucTips)
			} else t.viewUtil.displayPaymentFailed(t.wrap, $.tb.subByte(i.goods_info.goods_name, 24, ""), function() {
				t.closeMain(), t.sendMessage("paid", e)
			}, t)
		},
		getTdou: function(e) {
			var o = this,
				t = !1,
				i = e;
			"undefined" == typeof e && (i = !0), i ? (t = $(".j_baidu_tb_tdou_pay_info_box .j_tdou_enable_member").tbattr("checked"), this.closeMain()) : t = !1;
			var r = o.dataProxy.getPayInfoCache(),
				n = r.order_info.cpath,
				a = {
					consumption_path: r.order_info.scene_id,
					title: "\u7B2C\u4E09\u65B9\u652F\u4ED8:\u83B7\u53D6T\u8C46",
					need_tdou: 0,
					third_order_id: r.order_info.order_id,
					goods_cost_tdou: r.goods_info.tdou_num
				};
			t ? ($.extend(a, {
				title: "\u7B2C\u4E09\u65B9\u652F\u4ED8:\u5F00\u901A\u8D85\u7EA7\u4F1A\u5458,\u83B7\u53D6T\u8C46",
				pay_type: 7,
				tbs: r.tbs
			}), n && "1" == n.purchase && $.extend(a, {
				title: "\u7B2C\u4E09\u65B9\u652F\u4ED8:\u5F00\u901A\u8D85\u7EA7\u4F1A\u5458,\u83B7\u53D6T\u8C46,\u8D2D\u4E70\u5546\u54C1",
				pay_type: 9,
				tbs: r.tbs
			})) : n && "1" == n.purchase && $.extend(a, {
				title: "\u7B2C\u4E09\u65B9\u652F\u4ED8:\u8D2D\u4E70\u5546\u54C1,\u83B7\u53D6T\u8C46",
				pay_type: 8,
				third_order_id: r.order_info.order_id,
				tbs: r.tbs
			}), o.goCashier(a, i)
		},
		goCashier: function(e, o) {
			var t = this,
				i = {
					consumption_path: e.consumption_path,
					title: e.desc,
					need_tdou: e.current_need_tdou,
					goods_cost_tdou: e.goods_cost_tdou || 0,
					pay_type: e.pay_type || 6,
					tbs: e.tbs,
					order_id: e.third_order_id,
					is_dialog: !o,
					pay_info: t.pay_info
				};
			this.autoDirect.display_type = "third_app", this.autoDirect.third_order_id = e.third_order_id, this.autoDirect.createMain(i)
		},
		getIcon: function() {
			var e = this;
			e.closeMain();
			var o = e.dataProxy.getPayInfoCache();
			e.view = this.requireInstance("common/widget/Tdou/TdouView"), e.view.bind("after_buy_icon", function(t, i) {
				var r = o.goods_info,
					n = o.order_info,
					a = o.user_info;
				null != i && (a.Parr_scores = i), e.createUI(r, n, a)
			}, e);
			var t = o.order_info.scene_id,
				i = "\u7B2C\u4E09\u65B9\u8D2D\u4E70icon",
				r = o.goods_info.tdou_num;
			e.view.createMain(t, i, r)
		},
		closeMain: function() {
			this._dialog && this._dialog.close(), this.dialog = null
		},
		confirmCount: function() {
			var e = this,
				o = arguments[0],
				t = 0,
				i = new Date,
				r = i.getFullYear() + "" + (i.getMonth() + 1) + i.getDate();
			if("undefined" != typeof o) {
				t = parseInt(o);
				var n = r + "#" + t;
				$.tb.Storage.set(e.tdou_buy_confirm_tag, n)
			} else {
				if(o = $.tb.Storage.get(e.tdou_buy_confirm_tag), null == o) return 0;
				var a = o.split("#");
				t = a && 2 == a.length && a[0] == r ? parseInt(a[1]) : 0
			}
			return t
		},
		sendMessage: function(e, o) {
			var t = this,
				i = null;
			"closed" == e ? i = {
				command: "encourage_dialog_closed",
				data: o
			} : "paid" == e && (i = {
				command: "encourage_paid",
				data: o
			}), t.message && t.message(i)
		},
		handleError: function(e) {
			if(e) {
				var o = this,
					t = o.errors[e];
				return 11e4 == e ? (o.viewUtil.OpenLoginDialog(), void 0) : (t ? o.viewUtil.displayPaymentError(t) : o.viewUtil.displayPaymentError("\u672A\u77E5\u9519\u8BEF"), void 0)
			}
		}
	}
});
_.Module.define({
	path: "spage/component/Popframe",
	requires: [],
	sub: {
		defaultConfig: {
			top: 0,
			left: 0,
			width: "auto",
			height: "auto",
			clsName: "",
			html: "",
			wrap: "body"
		},
		initial: function() {
			try {} catch(e) {
				throw "undefined" != typeof alog && alog("exception.fire", "catch", {
					msg: e.message || e.description,
					path: "spage:component/popframe/popframe.js",
					method: "",
					ln: 14
				}), e
			}
		},
		createFrame: function(e) {
			var o = this,
				t = $('<div style="position:absolute;z-index:1000;"></div>');
			return o._config = $.extend(o.defaultConfig, e), t.css({
				top: o._config.top,
				left: o._config.left,
				width: o._config.width,
				height: o._config.height
			}).addClass(o._config.clsName).html(o._config.html).appendTo(o._config.wrap), e.isForumDir && o.correctFramePosition(), t
		},
		correctFramePosition: function() {
			var e = $(".d-up-frame"),
				o = $(window).height(),
				t = e.height(),
				i = $(".f-d-item-hover").offset().top,
				c = document.documentElement && document.documentElement.scrollTop || document.body.scrollTop;
			if(i >= c) {
				var n = i + t - (c + o);
				n > 0 && (o > t ? e.css("top", e.css("top").replace(/[^-\d\.]/g, "") - n) : e.css("top", e.css("top").replace(/[^-\d\.]/g, "") - 0 + c - i))
			} else e.css("top", e.css("top").replace(/[^-\d\.]/g, "") - 0 + c - i)
		}
	}
});
_.Module.define({
	path: "common/widget/ScrollPanel",
	sub: {
		dom: null,
		$content: null,
		$scrollBar: null,
		$scrollButton: null,
		_hasScroll: !1,
		_scrollStep: 50,
		_scrollTop: 0,
		_maxHeight: 0,
		initial: function(t) {
			this._buildUI(t), this._bindEvents(t), $(t.container).append(this.dom), this.setHeight(t.height || 100), t.content && this.setContent(t.content), t.scrollBarShow && this.bind("onScrollBarShow", t.scrollBarShow), t.scrollBarHide && this.bind("onScrollBarHide", t.scrollBarHide)
		},
		_buildUI: function(t) {
			this.dom = $('<div class="tbui_scroll_panel"></div>'), this.dom.html(['<div class="tbui_panel_content j_panel_content clearfix"><ul></ul></div>', '<div class="tbui_scroll_bar j_scroll_bar">', '<div class="tbui_scroll_button j_scroll_button">&nbsp;</div>', "</div>"].join("")), this.$content = this.dom.find(".j_panel_content:first"), this.$scrollBar = this.dom.find(".j_scroll_bar:first"), this.$scrollButton = this.dom.find(".j_scroll_button:first"), t.padding && this.$content.css("padding", t.padding)
		},
		_bindEvents: function() {
			var t = this,
				o = t.$content.get(0);
			this.$scrollButton.on("drag", function(i, l) {
				if(l) {
					var s = l.position;
					o.scrollTop = s.top / t.$content.height() * o.scrollHeight
				}
			}), this.$content.mousewheel(function(o, i) {
				o.preventDefault(), o.stopPropagation(), t._hasScroll && t.scrollTopTo(t._scrollTop - i * t._scrollStep)
			})
		},
		scrollTopTo: function(t) {
			var o = this,
				i = o.$content.get(0),
				t = Math.max(Math.min(t, i.scrollHeight - o.$content.height()), 0);
			t != o._scrollTop && (o._scrollTop = t, o.$content.stop(), o.$content.scrollTop(o._scrollTop), o._resizeScroll())
		},
		setHeight: function(t) {
			this._maxHeight = t, this._resizeHeight(), this._resizeScroll(), this.$scrollButton.draggable({
				containment: "parent"
			})
		},
		setContent: function(t) {
			this.$content.html(t), this.$content.get(0).scrollTop = this._scrollTop = 0, this._resizeHeight(), this._resizeScroll()
		},
		appendContent: function(t) {
			this.$content.append(t), this._resizeHeight(), this.scrollTopTo(2e4)
		},
		clearContent: function() {
			this.setContent("")
		},
		_resizeHeight: function() {
			this.$content.css("height", "");
			var t = this.$content.get(0),
				o = t.scrollHeight,
				i = Math.min(o, this._maxHeight);
			this.$content.css("height", i)
		},
		_resizeScroll: function() {
			var t = this.$content.get(0),
				o = t.scrollHeight,
				i = t.scrollTop,
				l = this.$content.innerHeight();
			l >= o ? (this.$scrollBar.hide(), this.dom.addClass("tbui_no_scroll_bar"), this.trigger("onScrollBarHide"), this._hasScroll = !1) : (this.$scrollBar.show(), this.$scrollBar.height(l), this.$scrollButton.height(l / o * l), this.$scrollButton.css("top", i / o * l), this.trigger("onScrollBarShow"), this._hasScroll = !0)
		}
	}
});
_.Module.define({
	path: "common/component/OftenVisitingForum",
	requires: [],
	sub: {
		initial: function(e) {
			this._forumNums = e.forumNums, this._likedForums = e.likedForums, this._likeForumWrapper = e.likeForumWrapper, this._moreForum = e.moreForum, this._addMoreForum = e.addMoreForum, this._itbs = e.itbs
		},
		showOftenForum: function() {
			var e = this,
				i = "http:" === $.tb.location.getProtocol() ? "https://gsp0.baidu.com/5aAHeD3nKhI2p27j8IqW0jdnxx1xbK" : "https://gsp0.baidu.com/5aAHeD3nKhI2p27j8IqW0jdnxx1xbK";
			$.JsLoadManager.use(i + "/tb/cms/itieba/oftenforum_jsdata.js", function() {
				e._setDialog = new $.dialog({
					width: 700,
					html: e._getAddForumContent(),
					title: "\u6DFB\u52A0\u5E38\u901B\u7684\u5427",
					draggable: !1,
					fixed: !1
				}), e._setDialog.bind("onclose", function() {
					e.sign_card && e.sign_card._j_card.hide()
				}), e._bindDialogEvent()
			}, "gbk")
		},
		_bindDialogEvent: function() {
			var e = this,
				i = this._setDialog.element;
			this._scroll_forum = i.find(".ordered_col"), i.find(".dialogJcontent").css("padding", "0"), i.delegate(".s_add_btn", "click", function(i) {
				i.preventDefault(), e._addLikeForum($("#s_add_inp").val().trim(), !0)
			}), this._scroll_forum.delegate("a", "click", function(i) {
				i.preventDefault(), "1" == $(this).data("likeflag") ? e._showConfirmDelConcernForumTip($(this)) : e._deleteLikedForum($(this))
			}), i.find(".l_add").delegate("a", "click", function(i) {
				i.preventDefault(), e._changeLikedForum($(this))
			}).delegate(".icon_addEd", "mouseover mouseout", function(i) {
				e._showUnlikeTip(i)
			}), i.tbattr("alog-alias", "like_dialog"), e._checkScroll()
		},
		_checkScroll: function() {
			var e = this._scroll_forum;
			e.innerHeight() > 90 ? e.addClass("scrollYOver") : e.removeClass("scrollYOver")
		},
		_addLikeForum: function(e, i, a) {
			var t = this;
			if(i && e.length <= 0) $("#s_add_tip").html("\u8BF7\u8F93\u5165\u5427\u540D~");
			else {
				var d = "/i/submit/add_user_favoforum?_t=" + (new Date).getTime(),
					r = {
						ie: "utf-8",
						kw: e,
						tbs: this._itbs
					};
				$.post(d, r, function(e) {
					r = $.parseJSON(e), r && (0 == r.error_no ? t._addLikeForumSuc(a, r.ret.add_forum[0]) : t._addLikeForumFail(a, r.error_no, r._info))
				})
			}
		},
		_addLikeForumSuc: function(e, i) {
			var a = this;
			if(e) {
				var t = '<div class="j_success_tiplayer success_tiplayer"><span class="success_tiptext">\u5DF2\u6210\u529F\u6DFB\u52A0</span></div>';
				$(e).prepend(t), $(e).find(".j_success_tiplayer").animate({
					top: "-32px",
					height: "29px"
				}, 100), $(e).find(".j_success_tiplayer").delay(2e3).animate({
					top: "-45px",
					height: "0"
				}, {
					duration: 80,
					complete: function() {
						$(e).find(".j_success_tiplayer").remove()
					}
				}), e.addClass("icon_addEd").tbattr("data-type", 1)
			} else $("#s_add_tip").text("\u6DFB\u52A0\u6210\u529F").removeClass("like_fail").addClass("like_succ"), setTimeout(function() {
				$("#s_add_tip").text("").removeClass("like_succ")
			}, 3e3), a._setDialog.element.find("a[data-fid=" + i.forum_id + "]").addClass("icon_addEd");
			a._likedForumInfo[i.forum_id] = i, a._likedForums.unshift(i);
			var d = '<a  rel="noreferrer" data-fid="' + i.forum_id + '" data-likeflag="' + i.is_like + '" data-fname="' + i.forum_name + '" data-type="' + i.forum_type + '" href="#">' + $.tb.subByte(i.forum_name, 10, "..") + "\u5427</a>";
			a._setDialog.element.find(".ordered_col").prepend(d);
			var r = a._likedForums.length;
			a._likeForumWrapper.trigger("addForum", [i, r])
		},
		_addLikeForumFail: function(e, i, a) {
			var t = "",
				d = this;
			switch(i) {
				case 29:
					t = "\u8BE5\u5427\u627E\u4E0D\u5230\uFF0C\u8BF7\u8F93\u5165\u5176\u4ED6\u5427\u8BD5\u8BD5~";
					break;
				case 10:
					t = "\u4F60\u8FD8\u672A\u586B\u5199\u7528\u6237\u540D\uFF0C\u8BF7\u70B9\u51FB\u9875\u9762\u53F3\u4E0A\u89D2\u4E2A\u4EBA\u4E2D\u5FC3\u586B\u5199\u7528\u6237\u540D~";
					break;
				case 36:
					t = "\u8BE5\u5427\u5DF2\u5728\u3010\u6211\u7231\u901B\u7684\u8D34\u5427\u3011\u5217\u8868\u91CC\uFF01";
					break;
				default:
					t = a
			}
			e ? d._showAlert(t) : ($("#s_add_tip").text(t).removeClass("like_succ").addClass("like_fail"), setTimeout(function() {
				$("#s_add_tip").text("").removeClass("like_fail")
			}, 3e3))
		},
		_deleteLikedForum: function(e) {
			var i = this,
				a = (e.tbattr("data-fid"), e.tbattr("data-fname")),
				t = e.tbattr("data-type"),
				d = "/i/submit/del_concernforum?stamp=" + (new Date).getTime(),
				r = e.tbattr("data-likeflag"),
				o = {
					tbs: this._itbs,
					fname: a,
					forum_type: t,
					is_like: r,
					ie: "utf-8"
				};
			$.post(d, o, function(a) {
				o = $.parseJSON(a), o && 0 == o.error_no ? i._delLikeForumSuc(e) : i._showAlert("\u5220\u9664\u5931\u8D25")
			})
		},
		_delLikeForumSuc: function(e) {
			var i = e.tbattr("data-fid"),
				a = this._setDialog.element;
			this._likedForumInfo[i] && delete this._likedForumInfo[i];
			for(var t = this._likedForums, d = 0; d < t.length; d++) t[d].forum_id == i && this._likedForums.splice(d, 1);
			a.find(".icon_addEd[data-fid=" + i + "]").removeClass("icon_addEd").find(".j_unliketip").remove(), a.find(".ordered_col").find("a[data-fid=" + i + "]").remove(), this._checkScroll();
			var r = this._likedForums[this._forumNums - 1],
				o = this._likedForums.length;
			this._likeForumWrapper.trigger("delForum", [i, r, o])
		},
		_changeLikedForum: function(e) {
			var i = this,
				a = e.tbattr("data-fname");
			e.hasClass("icon_addEd") ? i._deleteLikedForum(e) : i._addLikeForum(a, !1, e)
		},
		_showAlert: function(e) {
			var i = '<div style="padding:20px 20px; text-align:center; line-height:20px;font-size:13px;">' + e + "</div>";
			$.dialog.open(i, {
				title: "\u64CD\u4F5C\u5931\u8D25",
				width: 380
			})
		},
		_getAddForumContent: function() {
			if(ofJSData) {
				var e = this;
				e._likedForumInfo = {};
				var i = ofJSData.featTieba.data.feat,
					a = ofJSData.catagTieba.data.feat,
					t = this._likedForums,
					d = t.length,
					r = "",
					o = 0;
				if(r += '<div class="l_col ordered_col like_col often_forum clearfix" alog-group="like_col">', d > 0)
					for(var n = 0; d > n; n++) {
						o = t[n];
						var s = o.level_id ? "1" : "0"; - 1 != o.forum_id && (e._likedForumInfo[o.forum_id] = o, r += '<a  rel="noreferrer" href="#" data-type="' + o.forum_type + '" title="' + ($.tb.getByteLength(o.forum_name) > 10 ? o.forum_name : "") + '"data-likeflag="' + s + '" data-fname="' + o.forum_name + '" data-fid="' + o.forum_id + '">' + $.tb.subByte(o.forum_name, 10, "..") + "\u5427</a>")
					}
				r += "</div>", r += '<div class="like_col s_add clearfix"  alog-group="like_add"><div class="s_add_left">\u5427\u540D\u79F0:</div><div class="s_add_right"><input type="text" id="s_add_inp" class="s_add_inp"><a  rel="noreferrer" class="s_add_btn round_extral_for_btn" href="#">\u6DFB\u52A0</a></div><span class="s_add_tip" id="s_add_tip">\u6DFB\u52A0\u7231\u901B\u7684\u5427\uFF0C\u65F6\u523B\u5173\u6CE8\u6700\u65B0\u52A8\u6001</span></div>', r += '<div class="l_add l_like" alog-group="like_jingxuan"><div class="layer_hd"><span>\u8D34\u5427\u7CBE\u9009</span></div><div class="l_col add_col add_col_top clearfix">';
				for(var l = i.length, n = 0; l > n; n++) o = i[n], r += '<a  rel="noreferrer" href="#" data-fname="' + o.name + '" data-fid="' + o.id + '" ' + (e._likedForumInfo[o.id] ? 'class="icon_addEd" data-type="' + e._likedForumInfo[o.id].forum_type + '"' : "") + ">" + $.tb.subByte(o.name, 12, "..") + "</a>";
				r += '</div><div class="layer_hd"><span>\u5206\u7C7B\u7CBE\u9009</span></div><div class="l_col add_col  clearfix">', l = a.length;
				for(var n = 0; l > n; n++) {
					r += '<div class="l_class"><span>' + a[n].catag + "</span>";
					for(var _ = a[n].items, c = _.length, u = 0; c > u && !(u >= 5); u++) o = _[u], r += '<a  rel="noreferrer" href="#" data-fname="' + o.name + '" data-fid="' + o.id + '" ' + (e._likedForumInfo[o.id] ? 'class="icon_addEd" data-type="' + e._likedForumInfo[o.id].forum_type + '"' : "") + ">" + $.tb.subByte(o.name, 12, "..") + "</a>";
					r += "</div>"
				}
				return r += "</div>"
			}
		},
		_showUnlikeTip: function(e) {
			var i = '<div class="j_unliketip unliketip"><span class="unliketip_text">\u70B9\u51FB\u53D6\u6D88</span></div>';
			e = e || window.event;
			var a = e.target || e.srcElement;
			"mouseover" === e.type ? ($(a).prepend(i), $(a).find(".j_unliketip").stop(!0, !0).animate({
				top: "-32px",
				height: "35px"
			}, 100)) : $(a).find(".j_unliketip").stop(!0, !0).animate({
				top: "-40px",
				height: "0"
			}, {
				duration: 80,
				complete: function() {
					$(a).find(".j_unliketip").remove()
				}
			})
		},
		_showConfirmDelConcernForumTip: function(e) {
			var i = this;
			e = e || window.event, $("body").find("#tb_card_confirm_del").remove();
			var a = '<div class="confirmJ"><div class="confirmWrapper"><div class="confirmJContent"><span>\u5220\u9664\u540E\uFF0C\u4E5F\u4F1A\u540C\u6B65\u53D6\u6D88\u5BF9\u8BE5\u5427\u7684\u5173\u6CE8\uFF01</span></div><div class="confirmJAnswers"> <a  rel="noreferrer" href="#" class="ui_btn ui_btn_s btn_extral"><span><em>\u786E\u5B9A</em></span></a> <a  rel="noreferrer" href="#" class="ui_btn ui_btn_sub_s"> <span><em>\u53D6\u6D88</em></span></a></div></div></div>',
				t = $(e).offset().top + 29,
				d = $(e).offset().left - 34;
			_.Module.use("common/component/Card", [{
				content: a,
				arrow_dir: "up",
				card_css: {
					width: 250,
					top: t,
					left: d
				},
				attr: 'id="tb_card_confirm_del"',
				card_leave_hide: !0
			}], function(a) {
				i.sign_card = a, i._bindConfirmDelEvent(e), a.showCard()
			})
		},
		_bindConfirmDelEvent: function(e) {
			var i = this;
			$(".confirmJAnswers .ui_btn_s").on("click", function(a) {
				a.preventDefault(), i.sign_card && i.sign_card._j_card.hide(), i._deleteLikedForum(e)
			}), $(".confirmJAnswers .ui_btn_sub_s").on("click", function(e) {
				e.preventDefault(), i.sign_card && i.sign_card._j_card.hide()
			})
		}
	}
});