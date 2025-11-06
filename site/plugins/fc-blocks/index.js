(function() {
  "use strict";
  function normalizeComponent(scriptExports, render, staticRenderFns, functionalTemplate, injectStyles, scopeId, moduleIdentifier, shadowMode) {
    var options = typeof scriptExports === "function" ? scriptExports.options : scriptExports;
    if (render) {
      options.render = render;
      options.staticRenderFns = staticRenderFns;
      options._compiled = true;
    }
    if (scopeId) {
      options._scopeId = "data-v-" + scopeId;
    }
    return {
      exports: scriptExports,
      options
    };
  }
  const _sfc_main$4 = {
    computed: {
      textField() {
        return this.field("text");
      }
    }
  };
  var _sfc_render$4 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "k-block k-block-type-text" }, [_c("k-writer-input", { ref: "textbox", staticClass: "k-block-type-text-input", attrs: { "value": _vm.content.text, "marks": _vm.textField.marks, "nodes": _vm.textField.nodes, "headings": _vm.textField.headings }, on: { "input": function($event) {
      return _vm.update({ text: $event });
    } } }), _c("div", { staticClass: "fc-blocks-controls", on: { "click": _vm.open } }, [_c("k-color-frame", { attrs: { "color": _vm.content.color, "ratio": "1/1" } })], 1)], 1);
  };
  var _sfc_staticRenderFns$4 = [];
  _sfc_render$4._withStripped = true;
  var __component__$4 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$4,
    _sfc_render$4,
    _sfc_staticRenderFns$4,
    false,
    null,
    "abb98679"
  );
  __component__$4.options.__file = "/Users/maxesnee/Documents/Freelance/Clients/2025/Studio Guez/Les Fantastiques Communs/FC-backend/site/plugins/fc-blocks/src/components/BlockText.vue";
  const BlockText = __component__$4.exports;
  const _sfc_main$3 = {
    computed: {
      image() {
        var _a;
        return (_a = this.content.image[0]) == null ? void 0 : _a.image;
      }
    }
  };
  var _sfc_render$3 = function render() {
    var _a, _b, _c2;
    var _vm = this, _c = _vm._self._c;
    return _c("k-block-figure", { attrs: { "is-empty": !((_a = _vm.image) == null ? void 0 : _a.url), "empty-icon": "image", "empty-text": " Pas encore d'image sélectionnée " }, on: { "open": _vm.open, "update": _vm.update } }, [_c("div", { class: ["k-block", "k-block-type-image", "fc-image", `image-corner-${_vm.content.cornerradius}`], style: { color: _vm.content.color || "black" }, on: { "click": _vm.open } }, [_c("img", { attrs: { "src": (_b = _vm.image) == null ? void 0 : _b.url, "alt": (_c2 = _vm.image) == null ? void 0 : _c2.alt } })])]);
  };
  var _sfc_staticRenderFns$3 = [];
  _sfc_render$3._withStripped = true;
  var __component__$3 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$3,
    _sfc_render$3,
    _sfc_staticRenderFns$3,
    false,
    null,
    null
  );
  __component__$3.options.__file = "/Users/maxesnee/Documents/Freelance/Clients/2025/Studio Guez/Les Fantastiques Communs/FC-backend/site/plugins/fc-blocks/src/components/BlockImage.vue";
  const BlockImage = __component__$3.exports;
  const _sfc_main$2 = {};
  var _sfc_render$2 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "k-block k-block-type-link k-block-type-default", on: { "click": _vm.open, "update": _vm.update } }, [_c("k-block-title", { attrs: { "fieldset": { icon: "url", name: this.content.label, label: this.content.label == "" ? "Lien" : "" } } }), _c("div", { staticClass: "fc-blocks-controls", on: { "click": _vm.open } }, [_c("k-color-frame", { attrs: { "color": _vm.content.color, "ratio": "1/1" } })], 1)], 1);
  };
  var _sfc_staticRenderFns$2 = [];
  _sfc_render$2._withStripped = true;
  var __component__$2 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$2,
    _sfc_render$2,
    _sfc_staticRenderFns$2,
    false,
    null,
    "89ddcf20"
  );
  __component__$2.options.__file = "/Users/maxesnee/Documents/Freelance/Clients/2025/Studio Guez/Les Fantastiques Communs/FC-backend/site/plugins/fc-blocks/src/components/BlockLink.vue";
  const BlockLink = __component__$2.exports;
  const _sfc_main$1 = {};
  var _sfc_render$1 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "k-block k-block-type-link k-block-type-default", on: { "click": _vm.open, "update": _vm.update } }, [_c("k-block-title", { attrs: { "fieldset": { icon: "download", name: _vm.content.label, label: _vm.content.label == "" ? "Lien" : "" } } }), _c("div", { staticClass: "fc-blocks-controls", on: { "click": _vm.open } }, [_c("k-color-frame", { attrs: { "color": _vm.content.color, "ratio": "1/1" } })], 1)], 1);
  };
  var _sfc_staticRenderFns$1 = [];
  _sfc_render$1._withStripped = true;
  var __component__$1 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$1,
    _sfc_render$1,
    _sfc_staticRenderFns$1,
    false,
    null,
    "0b06bc28"
  );
  __component__$1.options.__file = "/Users/maxesnee/Documents/Freelance/Clients/2025/Studio Guez/Les Fantastiques Communs/FC-backend/site/plugins/fc-blocks/src/components/BlockFile.vue";
  const BlockFile = __component__$1.exports;
  const _sfc_main = {};
  var _sfc_render = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "k-block k-block-type-newsletter k-block-type-default", on: { "click": _vm.open, "update": _vm.update } }, [_c("k-block-title", { attrs: { "fieldset": { icon: "email", name: "Newsletter" } } }), _c("div", { staticClass: "fc-blocks-controls", on: { "click": _vm.open } }, [_c("k-color-frame", { attrs: { "color": _vm.content.color, "ratio": "1/1" } })], 1)], 1);
  };
  var _sfc_staticRenderFns = [];
  _sfc_render._withStripped = true;
  var __component__ = /* @__PURE__ */ normalizeComponent(
    _sfc_main,
    _sfc_render,
    _sfc_staticRenderFns,
    false,
    null,
    "fdd7c264"
  );
  __component__.options.__file = "/Users/maxesnee/Documents/Freelance/Clients/2025/Studio Guez/Les Fantastiques Communs/FC-backend/site/plugins/fc-blocks/src/components/BlockNewsletter.vue";
  const BlockNewsletter = __component__.exports;
  panel.plugin("maxesnee/fc-blocks", {
    blocks: {
      text: BlockText,
      image: BlockImage,
      link: BlockLink,
      file: BlockFile,
      newsletter: BlockNewsletter
    }
  });
})();
