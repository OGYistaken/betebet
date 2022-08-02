console.log("==== Get Slider JSON ====");
$.getJSON("/assets/slider.json", async function (data) {
  if ($(".master-slider .ms-container").length > 1) {
    $(".master-slider .ms-container")[1].remove();
  }

  var slider = new MasterSlider();

  slider.control("arrows").control("bullets", { autohide: true });

  var container = $(".master-slider");

  for (let value of data.slider) {
    if (value.status == "active") {
      var slide = $("<div />", { class: "ms-slide slide-" + value.id });
      var img = $("<img />", { "data-src": value.image });

      img.appendTo(slide);

      var img_gradient = $("<img />", {
        class: "ms-layer",
        height: "500",
        style: "width:1920px; margin-bottom: -200px;",
        "data-src": "/assets/images/gradient.png",
      }).attr({
        width: "1920",
        "data-type": "image",
        "data-origin": "bl",
      });

      img_gradient.appendTo(slide);

      if (value.link) {
        var link = $("<a />", { href: value.link, target: "_blank" });
        link.appendTo(slide);
      }

      slide.appendTo(container);
    }
  }

  slider.setup("masterslider", {
    width: 1440,
    height: 720,
    autoHeight: true,
    space: 5,
    fullwidth: true,
    autoplay: false,
    grabCursor: true,
    view: "parallaxMask",
    centerControls: false,
    speed: 18,
    loop: true,
    shuffle: true,
    preload: 1,

    minHeight: 0,
    start: 1,
    grabCursor: true,
    swipe: true,
    mouse: true,
    layout: "fullwidth",
    wheel: false,
    instantStartLayers: true,
    loop: true,
    shuffle: true,
    heightLimit: true,
    autoHeight: true,
    smoothHeight: true,
    endPause: false,
    overPause: true,
    fillMode: "fill",
    startOnAppear: false,
    layersMode: "full",
    autofillTarget: "",
    hideLayers: false,
    fullscreenMargin: 57,
    dir: "h",
    parallaxMode: "mouse",
  });
});
