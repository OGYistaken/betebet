function logIn(){
  $.ajax({
    type: 'POST',
    url: 'request.php?q=login',
    data: $('#form').serialize(),
    success: (response) => {
      if (response == 'success') {
        window.location.reload();
      }else{
        Swal.fire('Hata!','Kullanıcı adı ve ya şifre doğru değil', 'error')
      }
    }
  })
}

function logOut(){
  $.ajax({
    type: 'POST',
    url: 'request.php?q=logout',
    success: () => {
      window.location.reload();
    }
  })
}

function save(type){
  $.ajax({
    type: 'POST',
    url: 'request.php?q='+type,
    data: $('#form').serialize(),
    success: (response) => {
      if (response == 'success') {
        Swal.fire('','Değişiklikler Kaydedildi','success');
      }else{
        Swal.fire('','','error');
      }
    }
  })
}

function deleteData(table, id, e){
  $.ajax({
    type: 'POST',
    url: `request.php?q=delete&table=${table}&id=${id}`,
    success: (response) => {
      if (response == 'success') {
        $(e).closest('tr').remove();
      }
    }
  })
}

function deleteAllData(table,type=null){

  Swal.fire({
    html: 'Tüm kullanıcıları silmek istediğinize emin misiniz?',
    icon: 'warning',
    showCloseButton: true,
    showCancelButton: true}).then(result => {
      if (result.value) {
        $.ajax({
          type: 'POST',
          url: 'request.php?q=delete_all&table='+table+'&'+(type!==null ? `type=${type}` : ''),
          success: (response) => {
            if (response == 'success') {
              window.location.reload();
            }
          }
        })
      }
    })
}

function changeBalance(id){
  Swal.mixin({
    input: 'text',
    confirmButtonText: 'Kaydet',
    showCancelButton: true,
    progressSteps: ['1']
  }).queue([
    'Yeni bakiyeni giriniz'
  ]).then((result) => {
    if (result.value) {
      $.ajax({
        type: 'POST',
        url: 'request.php?q=change-balance',
        data: {
          balance: result.value[0],
          id: id
        },
        success: (response) => {
          if (response == 'success') {
            window.location.reload();
          }else{
            Swal.fire('Hata!','Bakiye boş bırakılamaz','error')
          }
        }
      })
    }
  })
}

function changeStatus(id, value, user_id, amount){
  let elem = $(event.target);
  let status = [{icon: 'success', text: 'Onaylandı'},{icon: 'danger', text: 'İptal Edildi'}];
  let index = parseInt(value) - 1;
  $.ajax({
    type: 'POST',
    data: {
      id: id,
      value: value,
      user_id: user_id,
      amount: amount
    },
    url: 'request.php?q=change-status',
    success: (response) => {
      if (response == "success") {
        elem.closest('tr').find('td.status').html(`
          <div class="dflex align-center">
            <span class="dot dot-${status[index].icon} m-r-10"></span>
            ${status[index].text}
          </div>
        `);
        elem.closest('ul').find('li.rm').remove();
      }
    }
  })
}

function showDetails(id){
  $.ajax({
    type: 'POST',
    data: {id},
    url: 'request.php?q=show-details',
    success: (response) => {
      if (response) {
        document.querySelector("#todo-list").innerHTML = "";
        let data = JSON.parse(response);
        for (let key in data) {
          if (title.hasOwnProperty(key)) {
            let li = document.createElement('li');
            li.classList.add('text-normal');
            let strong = document.createElement('string');
            strong.classList.add("flex-1", "text-500", "m-r-15");
            strong.innerText = title[key];
            let span = document.createElement("span");
            span.classList.add('flex-1');
            span.innerText = data[key]+(key == 'amount' ? ' TRY' : '');
            li.append(strong);
            li.append(span);
            document.querySelector("#todo-list").append(li)
          }
        }
      }
    }
  })
  openmodal("details-modal");
}

function addBank(){
  $.ajax({
    type: "POST",
    url: "request.php?q=add-bank",
    data: $("#form").serialize(),
    success: (response) => {
      if (response == 'success') {
        window.location.reload();
      }
    }
  })
}

function openmodal(selector){
  $(".modal").removeClass("active");
  $(".modal#"+selector).addClass("active");
}

function closemodal(){
  $(".modal").removeClass("active");
}

function exportTable(table, type){
  $.ajax({
    type: 'POST',
    url: 'request.php?q=export-table&table='+table+'&type='+type,
    success: (response, status, xhr) => {
      var filename = "";
      var disposition = xhr.getResponseHeader('Content-Disposition');
      if (disposition && disposition.indexOf('attachment') !== -1) {
        var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
        var matches = filenameRegex.exec(disposition);
        if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
      }

      var type = xhr.getResponseHeader('Content-Type');
      var blob = new Blob([response], { type: type });

      if (typeof window.navigator.msSaveBlob !== 'undefined') {
        // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
        window.navigator.msSaveBlob(blob, filename);
      } else {
        var URL = window.URL || window.webkitURL;
        var downloadUrl = URL.createObjectURL(blob);

        if (filename) {
          // use HTML5 a[download] attribute to specify filename
          var a = document.createElement("a");
          // safari doesn't support this yet
          if (typeof a.download === 'undefined') {
            window.location = downloadUrl;
          } else {
            a.href = downloadUrl;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
          }
        } else {
          window.location = downloadUrl;
        }
        setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100);
      }
    }
  })
}

function changePaymentStatus(type){
  $.ajax({
    type: "POST",
    url: "request.php?q=change-payment-status",
    data: { type },
    success: (res) => {
      location.reload();
    }
  })
}

function menuToggle(){
  $('.display-left').toggleClass('hidden-xs');
}

function switchTheme(){
  $.ajax({
    type: "POST",
    url: "request.php?q=switch-theme",
    success: () => {
      location.reload();
    }
  });
}

$(document).ready(function(){
  $("#sidebar-nav > li > a[href='"+window.location.href.split('/')[4].split('?')[0]+"']").parent().addClass("active");
  $("#sidebar-nav > li.dropdown > .dropdown-content > li > a[href='"+window.location.href.split('/')[4]+"']").parent().addClass("active");
});
