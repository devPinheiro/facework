(function () {
  //Sign up transitions
  $(document).ready(function () {
    //make an ajax call
    const baseUrl = 'http://facework.com.ng';
    $.ajax({
      type: "get",
      crossDomain: true,
      url: `${baseUrl}/api/skills`,
      success: function (data) {
        autocompleteInit(data.data);
      }
    });
  });

  function autocompleteInit(data) {
    // constructs the suggestion engine
    var services = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // `states` is an array of state names defined in "The Basics"
      local: data
    });

    $('#bloodhound .typeahead').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    }, {
      name: 'services',
      source: services
    });

  }

  //date picker
  $('#datepicker').datepicker({
    uiLibrary: 'bootstrap4'
  });

})();

$(document).ready(function () {
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    items: 4,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: false
      },
      600: {
        items: 2,
        nav: false
      },
      1000: {
        items: 4,
        nav: false,
        loop: false
      }
    }
  });

});


// Handle Feedback


let rating = 0;

if ($('#rating_sad')) {
  $('#rating_sad').click(() => {

    rating = 1;
    $('#rating_sad').css({
      'border': '1px solid #413eed',
      'padding': '5px 5px 0 5px',
      'border-radius': '50%'
    })

    // hide the remaning
    $('#rating_blah').hide('slow')
    $('#rating_happy').hide('slow')
    $('#rating_excellent').hide('slow')
  });

}

if ($('#rating_happy')) {
  $('#rating_happy').click(() => {

    rating = 3;
    $('#rating_happy').css({
      'border': '1px solid #413eed',
      'padding': '5px 5px 0 5px',
      'border-radius': '50%'
    })
    // hide the remaning
    $('#rating_blah').hide('slow')
    $('#rating_excellent').hide('slow')
    $('#rating_sad').hide('slow')
  });

}
if ($('#rating_excellent')) {
  $('#rating_excellent').click(() => {

    rating = 4;
    $('#rating_excellent').css({
      'border': '1px solid #413eed',
      'padding': '5px 5px 0 5px',
      'border-radius': '50%'
    })

    // hide the remaning
    $('#rating_blah').hide('slow')
    $('#rating_happy').hide('slow')
    $('#rating_sad').hide('slow')


  });

}


$('#rating_blah').click(() => {

  rating = 2;
  $('#rating_blah').css({
    'border': '1px solid #413eed',
    'padding': '5px 5px 0 5px',
    'border-radius': '50%'
  })

  // hide the remaning
  $('#rating_excellent').hide('slow')
  $('#rating_happy').hide('slow')
  $('#rating_sad').hide('slow')


});



const handleSubmmit = async () => {

  const feedback = $('#feedback').val();
  const data = {
    satisfaction: rating,
    description: feedback
  };


  // manipulate data
  const res = await sendFeedback(data);
  if (res) {
    console.log(res)

    // show alert
    $('.modal').modal('hide')

  }
}

if ($('#submit_feedback')) {
  $('#submit_feedback').click(() => handleSubmmit())
}

const sendFeedback = async (payload) => {
  const feedbackR = await fetch('http://facework.com.ng/api/feedback', {
    method: "post",
    mode: "no-cors",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json"
    },
    body: JSON.stringify(payload)
  });

  const feedbackResult = await feedbackR
  return {
    feedbackResult
  }
}


// D3.js

var data = [30, 86, 168, 281, 303, 365];

d3.select(".chart")
  .selectAll("div")
  .data(data)
    .enter()
    .append("div")
    .style("width", function(d) { return d + "px"; })
    .text(function(d) { return d; });




/*jslint  browser: true, white: true, plusplus: true */
/*global $, countries */