!function(e){var a={};function t(r){if(a[r])return a[r].exports;var n=a[r]={i:r,l:!1,exports:{}};return e[r].call(n.exports,n,n.exports,t),n.l=!0,n.exports}t.m=e,t.c=a,t.d=function(e,a,r){t.o(e,a)||Object.defineProperty(e,a,{enumerable:!0,get:r})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,a){if(1&a&&(e=t(e)),8&a)return e;if(4&a&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(t.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&a&&"string"!=typeof e)for(var n in e)t.d(r,n,function(a){return e[a]}.bind(null,n));return r},t.n=function(e){var a=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(a,"a",a),a},t.o=function(e,a){return Object.prototype.hasOwnProperty.call(e,a)},t.p="/",t(t.s=50)}({16:function(e,a){$(document).ready((function(){"affiliate"==$type?($('.registration-stage[data-type="only_broker"]').addClass("up"),setTimeout((function(){$('.registration-stage[data-type="only_broker"]').addClass("hidden"),$(".registration-stages").addClass("center")}),100)):"client"==$type&&($('.registration-stage[data-type="only_broker"]').removeClass("hidden"),setTimeout((function(){$('.registration-stage[data-type="only_broker"]').removeClass("up")}),100),setTimeout((function(){$(".registration-stages").removeClass("center")}),800));$('.registration-stage[data-id="'.concat(1,'"]')).addClass("none").removeClass("active").hide(),$('.registration-stage[data-id="'.concat(2,'"]')).addClass("active").removeClass("none").show(),$('.registration-stage[data-id="'.concat(1,'"]')).addClass("active").removeClass("none").show(),$('.registration-stage[data-id="'.concat(2,'"]')).addClass("prepare")}))},50:function(e,a,t){e.exports=t(51)},51:function(e,a,t){t(52),t(16),t(53),t(54),t(16)},52:function(e,a){var t={validClass:"not-error",rules:{email:{required:!0},phone_number:{required:!0},sex:{required:!0},secret_question:{required:!0},secret_answer:{required:!0}},errorPlacement:function(e,a){a.removeClass("not-error")},submitHandler:function(e){var a=$(e).serialize();$.ajax({url:"/affiliate/store-client ",type:"POST",data:a,success:function(a){$(".additional-reg").attr("data-client",a.client),registrationStepsSwitch(Number($(e).attr("data-id")))},error:function(e,a){$("#email").removeClass("not-error").addClass("error")}})}},r={validClass:"not-error",rules:{social_security:{required:!0,extension:"jpg|jpeg|png",filesize:1073741824},driver_license:{required:!0,extension:"jpg|jpeg|png",filesize:!0}},errorPlacement:function(e,a){a.removeClass("not-error")},submitHandler:function(e){var a=new FormData(e),t=$(e).attr("data-client");$.ajax({url:"/affiliate/client-details/create/dl-ss/"+t,type:"POST",data:a,cache:!1,contentType:!1,processData:!1,success:function(a){setupReviewData(a),registrationStepsSwitch(Number($(e).attr("data-id")))}})}},n={rules:{"client[full_name]":{required:!0},"client[dob]":{required:!0},"client[ssn]":{required:!0},"client[address]":{required:!0,valid_address:!0},"client[zip]":{required:!0},"client[sex_uploaded]":{required:!0}},errorPlacement:function(e,a){a.removeClass("not-error")},submitHandler:function(e){var a=$(e).serialize(),t=$("#add_client_5").attr("data-client");$.ajax({url:"/affiliate/client-review/"+t,type:"PUT",data:a,success:function(a){registrationStepsSwitch(Number($(e).attr("data-id")))}})}};setupReviewData=function(e){$form=$("#add_client_5"),(e.uploadedData.first_name||e.uploadedData.last_name)&&$form.find('[name="client[full_name]"]').val("".concat(e.uploadedData.first_name," ").concat(e.uploadedData.last_name)),e.uploadedData.dob&&$form.find('[name="client[dob]"]').val(e.uploadedData.dob),e.uploadedData.ssn&&$form.find('[name="client[ssn]"]').val(e.uploadedData.ssn),(e.uploadedData.number||e.uploadedData.name||e.uploadedData.city||e.uploadedData.state||e.uploadedData.zip)&&$form.find('[name="client[address]"]').val("".concat(e.uploadedData.number," ").concat(e.uploadedData.name," ").concat(e.uploadedData.city," ").concat(e.uploadedData.state," ").concat(e.uploadedData.zip))};$.validator.addMethod("valid_full_name",(function(e,a){return!!e.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/gi)}),"Please write your full name in this pattern first name middle name last name!!"),$.validator.addMethod("filesize",(function(e,a){return this.optional(a)||a.files[0].size<=10485760}),"File size must be less than 1mb"),$.validator.addMethod("extension",(function(e,a,t){return t="string"==typeof t?t.replace(/,/g,"|"):"png|jpe?g",this.optional(a)||e.match(new RegExp(".("+t+")$","i"))}),"Please enter a value with a valid extension."),$.validator.addMethod("valid_address",(function(e,a){return!!e.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g)}),"Not valid address format."),registrationStepsSwitch=function(e){var a=Number($(".additional-reg:last").attr("data-id")),t=e+1;e==a?($(".finish").removeClass("none"),$(".finish").addClass("active").show(),$('.additional-reg[data-id="'.concat(e,'"]')).addClass("none").removeClass("active").hide(),$('.registration-stage[data-id="'.concat(e,'"]')).addClass("active"),$('.registration-stage[data-id="finish"]').addClass("prepare")):t<=a&&($('.additional-reg[data-id="'.concat(e,'"]')).addClass("none").removeClass("active").hide(),$('.additional-reg[data-id="'.concat(t,'"]')).addClass("active").removeClass("none").show(),$('.registration-stage[data-id="'.concat(e,'"]')).addClass("active"),$('.registration-stage[data-id="'.concat(t,'"]')).addClass("prepare")),3==t&&$(".register-form").removeClass("big").addClass("large"),t>3&&$(".register-form").removeClass("large").addClass("big"),$("html, body").animate({scrollTop:$(".register-form").offset().top-50},1e3)},$(document).ready((function(){$(document).on("change","#secret_question",(function(){"other"==$(this).val()?$("#custom-secret-question").removeClass("none"):$("#custom-secret-question").addClass("none")})),$(".phone").mask("(000) 000-0000"),$("#register_form").validate(t),$("#add_client_3").validate(r),$("#add_client_4").submit((function(e){e.preventDefault(),function(e){data=$(e).serialize();var a=$("#add_client_4").attr("data-client");$.ajax({url:"/affiliate/client-credentials/"+a,type:"POST",data:data,success:function(a){registrationStepsSwitch(Number($(e).attr("data-id")))}})}(this)})),$("#add_client_5").validate(n)}))},53:function(e,a){$(document).ready((function(e){e("#ein_number").mask("00-0000000"),e("#social_number").mask("000-00-0000"),e("#phone_number").mask("(000) 000-0000"),e.validator.addMethod("valid_full_name",(function(e,a){return!!e.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/gi)}),"Please write your full name in this pattern first name middle name last name!!"),e("#clientDetailsForm").validate({validClass:"not-error",rules:{full_name:{required:!0,valid_full_name:!0},phone_number:{required:!0},address:{required:!0},secret_question:{required:!0},secret_answer:{required:!0}},messages:{password_confirmation:{equalTo:"Password confirmation doesn't match Password"}},errorPlacement:function(a,t){"sex"==t.attr("name")?a.insertAfter(e(t).closest("div")):a.insertAfter(t)}})}))},54:function(e,a){$(document).ready((function(){$(".finish-reg").click((function(){$.ajax({url:"/affiliate/check-as-finished",type:"GET",success:function(e){$(".register-form").addClass("d-none"),$(".affiliate-dashboard").removeClass("d-none").hide().show("slow")},error:function(e){location.reload()}})}))}))}});