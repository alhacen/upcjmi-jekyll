document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, {
        fullWidth: true,
        duration: 300
    });
    var models = document.querySelectorAll('.modal');
    var modelsInstances = M.Modal.init(models);

    setInterval(function () {
        M.Carousel.getInstance(document.querySelector('.carousel')).next();
    }, 5000);

    const scriptURL = 'https://script.google.com/macros/s/AKfycbwRj5x_BwJNCSTlSIxhPhDYEobDjdewtMsvJR3Y6PY3CQ99IrEH/exec';
    const form = document.forms['contact-sheet-form']

    form.addEventListener('submit', e => {
        e.preventDefault()
        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
          .then(response => {
              console.log('Success!', response);
              M.toast({html: 'Thankyou for contacting us'})
            })
          .catch(error => {
              console.error('Error!', error.message);
              M.toast({html: 'Unknown error occured'});

            })
      })
});
