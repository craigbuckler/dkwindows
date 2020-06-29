/*	---------------------------------------------

	owl.TabControl

	--------------------------------------------- */
if (owl && owl.Dom && owl.Event && owl.Effect && !owl.TabControl) {

	owl.TabControl = function(tab) {
		
		// tab already active?
		this.aClass = owl.TabControl.Config.ActiveClass;
		if (owl.Css.ClassExists(tab, this.aClass)) return;
		
		// initialise
		owl.Css.ClassApply(tab, this.aClass);
		this.List = tab;
		this.Tab = {};
		this.Active = null;
		var T = this;
		
		owl.Each(owl.Dom.Get("a", tab), function(a) {
		
			// find tab and content
			var id = T.LinkId(a);
			var content = owl.Dom.Get("#"+id);
			T.Tab[id] = {
				link: a,
				content: (content.length == 1 ? content[0] : null)
			};

			// deactivate tab
			T.Activate(id, false);

			// is tab active?
			if (T.Active === null || "#"+id == location.hash) T.Active = id;
			
			// event delegation
			var k = owl.Dom.Get("a[href*="+id+"]");
			owl.Each(k, function(l) {
				if (T.LinkId(l) == id) new owl.Event(l, "click", function (e) { T.TabSwitch(e); });
			});
		
		});
		
		// show active tab/content
		this.Activate(this.Active);
	
	};
	
	
	// return link
	owl.TabControl.prototype.LinkId = function(link) {
		return link.href.replace(/.*#(.+)$/, "$1");
	};
	

	// tab click event handler
	owl.TabControl.prototype.TabSwitch = function(e) {

		e.StopPropagation();
		e.StopDefaultAction();

		var id = this.LinkId(e.Element);
		if (id != this.Active) {

			// hide old tab
			this.Activate(this.Active, false);

			// switch to new tab
			this.Active = id;
			this.Activate(this.Active);

		}

		// scroll to tab box if required
		owl.Screen.ScrollToElement(this.List);

		return false;
	};



	// activate or deactivate a tab
	owl.TabControl.prototype.Activate = function(id, show) {

		if (this.Tab[id]) {
			if (show !== false) {
				owl.Css.ClassApply(this.Tab[id].link, this.aClass);
				if (this.Tab[id].content) this.Tab[id].content.style.display = "block";
			}
			else {
				owl.Css.ClassRemove(this.Tab[id].link, this.aClass);
				if (this.Tab[id].content) this.Tab[id].content.style.display = "none";
			}
		}

	};


	
	/* ---------------------------------------------
	owl.Tabs.Config
	--------------------------------------------- */
	owl.TabControl.Config = {
		AutoStart: true,
		TabLinks: "ul.tabs",
		ActiveClass: "active"
	};
	
	// auto-start fader
	if (owl.TabControl.Config.AutoStart) new owl.Event(window, "load", function (e) {
		owl.Each(owl.Dom.Get(owl.TabControl.Config.TabLinks), function(t) { new owl.TabControl(t); });
	}, 99999);

}