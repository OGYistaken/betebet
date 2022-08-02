var promotions;

$.when(

	console.log("==== Add Promotions Modal ===="),
	$.getScript( "//1164148392.rsc.cdn77.org/sites/betebet/v3/assets/js/tingle.js" ),
	$.Deferred(function( deferred ){ $( deferred.resolve ); })

).done(function(){

	console.log("==== Get Promotions JSON ====");
	$.getJSON( "//1164148392.rsc.cdn77.org/sites/betebet/v3/assets/json/promotions.json", function( data ) {

		var container = $(".promotions-container");
		container.html("");

		if($(".container.promotions").length > 1) $(".container.promotions")[1].remove();

		$.each(data.promotions, function(key, value) {
			promotions = data;
			if(value.status == "active") {

				var promo      = $("<li />", { "id" : "promo-" + value.id });
				var promo_link = $("<a />", { "href" : "javascript:;", "data-id" : value.id }).on("click", function() {
					if(value.hasLink) {
						BM.show_modal(value.id);
					}
				});
				var promo_img  = $("<img />" , { "src" : value.image });

				promo_img.appendTo(promo_link);
				promo_link.appendTo(promo);
				promo.appendTo(container);
				
			}

		});

		BM.init();
	});

});


var d = $(document), w = $(window), BM = {
	betebet_modal : "",
	init          : function() {
		BM.createModal();
	},
	show_modal : function(id) {
		var promotion   = promotions.promotions.filter( function(data){ return data.id == id } )[0]
		var modal_image = $("<img />", { "src" : promotion.popup_image});
		var modal_title = $("<h3 />").text(promotion.title);
		var modal_text  = $("<div />").html(promotion.text);

		$(".betebet_modal_container .modal_image").html(modal_image);
		$(".aciklama").html("");

		modal_title.appendTo(".aciklama");
		modal_text.appendTo(".aciklama");

		var modal_content = $(".betebet_modal_container").html();
		BM.betebet_modal.setContent(modal_content);

		BM.betebet_modal.open();
	},
	createModal : function() {
		BM.betebet_modal = new tingle.modal();
	},
}
