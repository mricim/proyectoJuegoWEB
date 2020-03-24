grecaptcha.ready(function () {
    grecaptcha.execute('6LctbbsUAAAAAHVc5Cp-j8FZKOZG1wAH0eUV690D', {
        action: 'login'
    }).then(function (token) {
        var x = document.getElementsByClassName('recaptcha_response');
        for (i = 0; i < x.length; i++) {
            var cog = x[i].value;
            x[i].value = token;
        }
    });
});
