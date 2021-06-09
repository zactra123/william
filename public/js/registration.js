!(function (e) {
    var t = {};
    function r(a) {
        if (t[a]) return t[a].exports;
        var n = (t[a] = { i: a, l: !1, exports: {} });
        return e[a].call(n.exports, n, n.exports, r), (n.l = !0), n.exports;
    }
    (r.m = e),
        (r.c = t),
        (r.d = function (e, t, a) {
            r.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: a });
        }),
        (r.r = function (e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 });
        }),
        (r.t = function (e, t) {
            if ((1 & t && (e = r(e)), 8 & t)) return e;
            if (4 & t && "object" == typeof e && e && e.__esModule) return e;
            var a = Object.create(null);
            if ((r.r(a), Object.defineProperty(a, "default", { enumerable: !0, value: e }), 2 & t && "string" != typeof e))
                for (var n in e)
                    r.d(
                        a,
                        n,
                        function (t) {
                            return e[t];
                        }.bind(null, n)
                    );
            return a;
        }),
        (r.n = function (e) {
            var t =
                e && e.__esModule
                    ? function () {
                          return e.default;
                      }
                    : function () {
                          return e;
                      };
            return r.d(t, "a", t), t;
        }),
        (r.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t);
        }),
        (r.p = "/"),
        r((r.s = 55));
})({
    55: function (e, t, r) {
        e.exports = r(56);
    },
    56: function (e, t, r) {
        r(57);
    },
    57: function (e, t) {
        var r = {
            validClass: "not-error",
            rules: {
                full_name: { required: !0, valid_full_name: !0 },
                phone_number: { required: !0 },
                ssn: {
                    required: {
                        depends: function () {
                            return null == $('input[name="ein"]').val() || "" == $('input[name="ein"]').val();
                        },
                    },
                    valid_length: {
                        param: 11,
                        depends: function (e) {
                            return "" != $('input[name="ssn"]').val();
                        },
                    },
                },
                ein: {
                    required: {
                        depends: function () {
                            return null == $('input[name="ssn"]').val() || !$('input[name="ssn"]').valid();
                        },
                    },
                    valid_length: {
                        param: 10,
                        depends: function (e) {
                            return null != $('input[name="ein"]').val() && "" != $('input[name="ein"]').val();
                        },
                    },
                },
                dob: { required: !0 },
                sex: { required: !0 },
                secret_question: { required: !0 },
                secret_answer: { required: !0 },
                email: { required: !0, email: !0 },
                address: { required: !0, valid_address: !0 },
                password: { required: !0, password_requirements: !0 },
                password_confirmation: { required: !0, equalTo: "#register_password_confirm" },
            },
            messages: { password: "Please use valid password format", password_confirmation: { equalTo: "Password confirmation doesn't match Password" } },
            errorPlacement: function (e, t) {
                t.removeClass("not-error");
            },
        };
        $.validator.addMethod(
            "password_requirements",
            function (e, t) {
                var r = !!e.match(/^(.{8,20})$/gm),
                    a = !!e.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm),
                    n = !!e.match(/\d/gm),
                    s = !!e.match(/\W|_/g);
                return r && a && n && s;
            },
            "Please pay attention on password requirements"
        ),
            $.validator.addMethod(
                "valid_full_name",
                function (e, t) {
                    return !!e.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/gi);
                },
                "Please write your full name in this pattern first name middle name last name!!"
            ),
            $.validator.addMethod(
                "valid_length",
                function (e, t, r) {
                    return e.length == r;
                },
                "This field is not valid!"
            ),
            $.validator.addMethod(
                "valid_address",
                function (e, t) {
                    return !!e.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g);
                },
                "Not valid address format."
            ),
            $(document).ready(function () {
                $(".ssn").mask("000-00-0000"), $(".ein").mask("00-0000000"), $(".phone").mask("(000) 000-0000");
                var e = "client";
                $("form.additional-reg").on("submit", function (t) {
                    t.preventDefault(),
                        (e = $("input[type='radio']:checked").val()),
                        ($form = $('[id="'.concat(e, '-registration-form"]')).html()),
                        $(".register_form").html($form),
                        $(".ssn").mask("000-00-0000"),
                        $(".ein").mask("00-0000000"),
                        $(".phone").mask("(000) 000-0000"),
                        $("#register_form").validate(r),
                        $(document).bind("cut copy paste", "#register_password", function (e) {
                            e.preventDefault();
                        });
                    var a = Number($(this).attr("data-id")),
                        n = a + 1;
                    $('.additional-reg[data-id="'.concat(a, '"]')).addClass("none").removeClass("active").hide(),
                        $('.additional-reg[data-id="'.concat(n, '"]')).addClass("active").removeClass("none").show(),
                        $('.registration-stage[data-id="'.concat(a, '"]')).addClass("active"),
                        $('.registration-stage[data-id="'.concat(n, '"]')).addClass("prepare"),
                        $("html, body").animate({ scrollTop: $(".register-form").offset().top - 50 }, 1e3);
                }),
                    $(document).on("change", "#secret_question", function () {
                        "other" == $(this).val() ? $("#custom-secret-question").removeClass("none") : $("#custom-secret-question").addClass("none");
                    }),
                    $('input[name="register_type"]').on("change", function () {
                        $(this).parents(".register-type").addClass("active"),
                            $(this).parents(".register-type").siblings(".active").removeClass("active"),
                            "broker" == $(this).val()
                                ? ($('.registration-stage[data-type="only_broker"]').addClass("up"),
                                  setTimeout(function () {
                                      $('.registration-stage[data-type="only_broker"]').addClass("hidden"), $(".registration-stages").addClass("center");
                                  }, 100))
                                : ($('.registration-stage[data-type="only_broker"]').removeClass("hidden"),
                                  setTimeout(function () {
                                      $('.registration-stage[data-type="only_broker"]').removeClass("up");
                                  }, 100),
                                  setTimeout(function () {
                                      $(".registration-stages").removeClass("center");
                                  }, 800));
                    }),
                    $(document).on("focus keyup", "#register_password", function () {
                        var e = this;
                        $(e).popover({
                            html: !0,
                            trigger: "manual",
                            content: function () {
                                var t = "fa-check-circle text-secondary",
                                    r = "fa-check-circle text-success",
                                    a = "fa-minus-circle text-danger",
                                    n = $("#password-requirements").html(),
                                    s = $(e).val();
                                return (
                                    s.length
                                        ? ((valid_length = !!s.match(/^(.{8,20})$/gm)),
                                          (upper_lower = !!s.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)),
                                          (digit = !!s.match(/\d/gm)),
                                          (special = !!s.match(/\W|_/g)),
                                          (password_requirements = n
                                              .replace("{length-class}", valid_length ? r : a)
                                              .replace("{letters-class}", upper_lower ? r : a)
                                              .replace("{digit-class}", digit ? r : a)
                                              .replace("{special-class}", special ? r : a)))
                                        : (password_requirements = n.replace("{length-class}", t).replace("{letters-class}", t).replace("{digit-class}", t).replace("{special-class}", t)),
                                    password_requirements
                                );
                            },
                            title: "Password Requirements",
                            placement: window.innerWidth < 1e3 ? "bottom" : "right",
                        }),
                            $(e).popover("show"),
                            $(e).popover("update");
                    }),
                    $(document).on("focusout", "#register_password", function () {
                        $(this).popover("hide");
                    });
            });
    },
});
