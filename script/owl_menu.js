/*	---------------------------------------------

	owl.Menu

	--------------------------------------------- */
if (owl.Dom && owl.Event && owl.Timer && !owl.Menu) {

	owl.Menu = function() {

		var $C;

		// initialise
		function Init(setup) {

			$C = setup;
			owl.Each(owl.Dom.Get($C.Elements), function(sm) { new SubMenu(sm); });

		}


		// define a new submenu
		function SubMenu(sm) {

			this.Menu = sm;
			this.Timer = null;
			this.Throttle = null;

			var m = this.MenuOpen = sm.parentNode;
			var T = this;
			owl.Each(["mouseover", "mouseout", "focus", "blur"], function(type) {
				new owl.Event(m, type, function(evt) { T.EventThrottle(evt); });
			});

		}

		// throttle submenu events
		SubMenu.prototype.EventThrottle = function(evt) {

			evt.StopPropagation();
			if (this.Throttle) clearInterval(this.Throttle);
			var T= this;
			this.Throttle = setTimeout(function() { T.EventHandler(evt); }, $C.Throttle);

		};


		// handle submenu event
		SubMenu.prototype.EventHandler = function(evt) {

			var T= this;

			if (evt.Type == "mouseover" || evt.Type == "focus") {

				// show menu
				if (!this.Timer) {
					owl.Css.ClassApply(this.MenuOpen, $C.OpenClass);
					this.Timer = new owl.Timer(0, $C.MaxOpacity, $C.FadeStep, $C.FadePause);
					this.Timer.CallBack = function(t) { owl.Css.Opacity(T.Menu, t.Value); };
					this.Timer.OnStop = function(t) { if (t.Value == 0) { T.Timer = null; owl.Css.ClassRemove(T.MenuOpen, $C.OpenClass); } };
					this.Timer.Start();
				}

			}
			else {

				// hide menu
				if (this.Timer && this.Timer.StopValue != 0) {
					this.Timer.Reverse();
					this.Timer.Start();
				}

			}

		};

		return { Init: Init };

	}();

	
	/* ---------------------------------------------
	owl.Menu.Config
	--------------------------------------------- */
	owl.Menu.Config = {
		AutoStart: true,
		Elements: "header nav ul ul",
		Throttle: 200,
		OpenClass: "active",
		MaxOpacity: 90,
		FadeStep: 5,
		FadePause: 10
	};
	
	// auto-start menu
	if (owl.Menu.Config.AutoStart) new owl.Event(window, "load", function (e) {
		owl.Menu.Init(owl.Menu.Config);
	}, 99999);

}