function logIn() {
  event.preventDefault();
  if (phone_status == 1 || passport_status == 1) {
    $(".loginSteps #step_1").addClass("dnone");
    $(".loginSteps #step_2").removeClass("dnone");
    phone_status = 0;
    passport_status = 0;
  } else {
    $.ajax({
      type: "POST",
      url: "/request.php?q=login",
      data: $("#login_form").serialize(),
      success: (response) => {
        if (response == "error") {
          $(".loginSteps #step_1").removeClass("dnone");
          $(".loginSteps #step_2").addClass("dnone");
          Swal.fire("Hata!", "Kullanıcı adı ve ya şifre hatalı.", "error");
          return;
        } else if (response == "error_phone") {
          Swal.fire("Hata!", "Telefon numarasını yanlış girdiniz.", "error");
          return;
        } else {
          if (locate == 0) {
            window.location.href = '/';
          } else {
            window.location.href = "deposit";
          }
        }
      },
    });
  }
}

function logOut() {
  $.ajax({
    type: "POST",
    url: "/request.php?q=logout",
    success: (response) => {
      window.location.href = "/";
    },
  });
}

function signUp() {
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "/request.php?q=signup",
    data: $("#register_form").serialize(),
    success: (response) => {
      if (response == "error") {
        Swal.fire("Hata!", "Bilgileri doğru girdiğinizden emin olun", "error");
      } else {
        if (locate == 0) {
          window.location.reload();
        } else {
          window.location.href = "deposit";
        }
      }
    },
  });
}

var betslip = [];
function clearBetslip() {
  $("[bsid]").removeClass("active");
  betslip = [];
  renderBetslip();
}
function deleteSlip(i) {
  let s = betslip[i];
  $('[bsid="' + s.id + '"]').removeClass("active");
  betslip.splice(i, 1);
  renderBetslip();
}
function renderBetslip() {
  $("#slips").empty();
  if (betslip.length == 0) {
    $("#fullslip").hide();
    $("#emptyslip").show();
  } else {
    $("#fullslip").show();
    $("#emptyslip").hide();
  }
  let totalodds = parseFloat(
    betslip.reduce((sum, bs) => (sum = sum * bs.odds), 1)
  );
  let totalbet = parseFloat($("#bsamount").val()) || 1;
  var totalwon = totalodds * totalbet;
  $("[slipnum]").text(betslip.length);
  $("[totalodds]").text(totalodds.toFixed(2));
  $("[totalbet]").text(totalbet.toFixed(2));
  $("[totalwon]").text(totalwon.toFixed(2));
  betslip.forEach((s, i) => {
    $("#slips").append(`
    <app-coupon type="multi" class="ng-star-inserted">
    <div class="coupon clear">
        <div class="coupon-row flex-container">
            <div class="match-check"><input class="filled-in ng-untouched ng-pristine ng-valid" type="checkbox"><label for="3000335450-1"></label>
            </div>
            <div class="match-info flex-item">
                <div class="title ng-star-inserted">${s.h} - ${s.a}</div>
                <div class="btg-container clear"><span class="btg-name">1x2:</span>
                    <span class="selection ng-star-inserted">${s.o}</span></div>
            </div><br>
            <div class="match-rate">${s.odds}</div>
        </div>
        <div class="coupon-row bottom flex-container">
            <div class="coupon-close"><a onclick="deleteSlip(${i})" class="close" href="javascript:;"><i class="fa fa-times"></i></a></div>
        </div>
    </div>
</app-coupon>
    `);
  });
}
$(document).on("click", ".bet-btn", function () {
  if ($(this).hasClass("active")) {
    let bsid = $(this).attr("bsid");
    let fi = betslip.findIndex((z) => z.id == bsid);
    if (fi >= 0) {
      deleteSlip(fi);
    } else {
      $(this).removeClass("active");
    }
  } else {
    let bsid = Date.now();
    $(this).attr("bsid", bsid).addClass("active");
    let bnames = $(this).closest("[enames]").text().split("|");
    betslip.push({
      id: bsid,
      h: bnames[0],
      a: bnames[1],
      o: $(this).find(".bet-btn-text").text(),
      odds: $(this).find(".bet-btn-odd").text(),
    });
    renderBetslip();
  }
});
