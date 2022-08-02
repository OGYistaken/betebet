$(document).ready(function () {
  $(".modul-accordion > .modul-header").on("click", function () {
    $(this).parent().find(".modul-content").slideToggle(200);
  });
  $(".flex-container > .flex-item").on("click", function () {
    $(this).parent().find(".flex-item").removeClass("active");
    $(this).addClass("active");
  });
  $(".horizontal-slide-content > .horizontal-slide-tab").on(
    "click",
    function () {
      $(this).parent().find(".horizontal-slide-tab").removeClass("active");
      $(this).addClass("active");
    }
  );
  $(".live-tabs > a").on("click", function () {
    $(this).parent().find("a").removeClass("active");
    $(this).addClass("active");
  });
  $(".events-bar .events > a").on("click", function () {
    $(this).closest(".events-bar").find("a").removeClass("active");
    $(this).addClass("active");
  });
  $(".collection .collection-item").on("click", function () {
    $(this)
      .closest(".collection")
      .find(".collection-item")
      .removeClass("active");
    $(this).addClass("active");
  });
  $(".dropdown-button").on("click", function () {
    if ($(this).next().hasClass("active")) {
      $(".dropdown-content").removeClass("active");
    } else {
      $(".dropdown-content").removeClass("active");
      $(this).next().addClass("active");
    }
  });
  $('[materialize="dropdown"]').on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).next().removeClass("active");
      $(this).next().hide();
    } else {
      $(this).addClass("active");
      $(this).next().addClass("active");
      $(this).next().show();
    }
  });
  $(`.mn-menu > ul > li > a[href="${location.pathname}"]`).addClass("active");
  $(`.collection > .collection-item > a[href="${location.pathname}"]`).addClass(
    "active"
  );
});

$(document).scroll(function (e) {
  const scroll = $(window).scrollTop();
  if (scroll > 200) {
    $("#header").addClass("header-fix animated fadeInDown");
    $("body").css("padding-top", "200px");
  } else {
    $("#header").removeClass("header-fix animated fadeInDown");
    $("body").css("padding-top", "0px");
  }
});

function openmodal(type) {
  $(".modal").removeClass("active");
  $(".modal-overlay").remove();
  let backdrop = document.createElement("div");
  backdrop.classList.add("modal-overlay", "active");
  backdrop.setAttribute("onclick", "closemodal()");
  document.body.append(backdrop);
  $(".modal#" + type).addClass("active");
}

function closemodal() {
  $(".modal").removeClass("active");
  $(".modal-overlay").remove();
}

function openzopim() {
  $zopim.livechat.window.show();
}

function loginoralert() {
  if (logged) {
    Swal.fire(
      "Yetersiz Bakiye",
      "Lütfen bakiyenizi güncelledikten sonra tekrar deneyin",
      "warning"
    ).then((res) => {
      if (res.value == true) {
        // window.location.href = "/deposit";
      }
    });
  } else {
    Swal.fire("", "Lütfen hesabınıza giriş yapın", "warning");
  }
}

function loginorpay() {
  if (logged == true) {
    window.location.href = "/deposit";
  } else {
    openmodal("sgn-mdl");
  }
}

function openPay(src) {
  const iframe = $("#paymentFrame");
  const iframeContent = $("#paymentFrame").contents().find("body");
  iframe.attr("src", `/payment/${src}`);
  iframe.css("height", `${iframeContent.height()}`);
  console.log(iframeContent.height());
  openmodal("PaymentFormModal");
}

$(document).on("click", 'a[href="#"]', (e) => e.preventDefault());
$(document).on("submit", 'form[action="#"]', (e) => e.preventDefault());
