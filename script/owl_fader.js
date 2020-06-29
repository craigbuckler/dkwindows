/*	---------------------------------------------

	owl.Fader

	--------------------------------------------- */
if (owl.Dom && owl.Event && owl.Image && owl.Timer && !owl.Fader) {

	owl.Fader = function() {

		var $C, fnode, img;

		// load images for fader
		function Init(setup) {
			$C = setup;
			fnode = owl.Dom.Get($C.Element);
			if (fnode.length == 1) {
				fnode = fnode[0];
				img = $C.Add;
				var i = 0, r;
				while (i < $C.Add) {
					r = Math.round(Math.random() * $C.Images.length);
					if ($C.Images[r]) {
						owl.Image.Load($C.ImgLoc+$C.Images[r]+".jpg", AddImage)
						$C.Images[r] = null;
						i++;
					}
				}
			}
		}

		// add image
		function AddImage(i) {
			var ai = document.createElement("img");
			ai.src = i.src;
			ai.width = i.width;
			ai.height = i.height;
			ai.style.zIndex = -1;
			fnode.insertBefore(ai, fnode.firstChild);
			img--;
			if (img == 0) new Fader(fnode);
		}

		// fader
		function Fader(element) {
			this.Element = element;
			this.Item = owl.Dom.Descendents(element, 1);
			if (this.Item.length > 1) {

				// apply z-index
				owl.Each(this.Item, function(e, i) { e.style.zIndex = i + $C.zIndex; });

				// set up fade animation
				this.Current = this.Item.length - 1;
				this.Start();

			}
		}

		// start fader
		Fader.prototype.Start = function() {

			var T = this;
			var E = this.Item[this.Current];
			this.Timer = new owl.Timer(100, 0, -$C.Step, $C.Pause, $C.Delay, 0);
			this.Timer.CallBack = function(t) { owl.Css.Opacity(E, t.Value, false); };
			this.Timer.OnStop = function(t) {

				// move slide to back
				var z = parseInt(E.style.zIndex, 10);
				z -= T.Item.length;
				if (z < 0) z+= $C.zIndex;
				E.style.zIndex = z;
				owl.Css.Opacity(E, 100);

				// reset timer
				T.Timer = null;
				T.Current--;
				if (T.Current < 0) T.Current = T.Item.length - 1;
				T.Start();

			};
			this.Timer.Start();

		};

		return { Init: Init };

	}();
	
	
	/* ---------------------------------------------
	owl.Fader.Config
	--------------------------------------------- */
	owl.Fader.Config = {
		AutoStart: true,
		ImgLoc: "images/intro/",
		Images: ["conservatory-1","kitchen-window-1","loft-windows-1","porch-1","roof-fascia","roof-skylight-1","window-installation-1","window-repair"],
		Element: "#mainimage",
		Add: 4,
		Delay: 4000,
		Step: 1,
		Pause: 20,
		zIndex: 999
	};
	
	// auto-start fader
	if (owl.Fader.Config.AutoStart) new owl.Event(window, "load", function (e) {
		owl.Fader.Init(owl.Fader.Config);
	}, 99999);

}