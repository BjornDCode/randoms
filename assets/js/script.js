$(document).ready(function() {

    // Global Variable
    var $window = $(window);

    function slideInAtFifty($window, $elem) {
        $window.on('scroll', function() {
            if ( $window.scrollTop() > $elem.offset().top - $window.height() / 2 ) {
                $elem.addClass('in-view');
            }
        });
    }

    function slideInAtHundred($window, $elem) {
        $window.on('scroll', function() {
            if ( $window.scrollTop() > $elem.offset().top - $window.height() ) {
                $elem.addClass('in-view');
            }
        });
    }

    function slideInAtCustom($window, $elem, $height) {
        $window.on('scroll', function() {
            if ( $window.scrollTop() > $elem.offset().top - $window.height() + $height ) {
                $elem.addClass('in-view');
            }
        });
    }

    var navigation = (function() {

        var $hamburger = $('.hamburger');
        if ($hamburger.length) {
            $hamburger.on('click', function() {
                $hamburger.toggleClass('is-active');
            })
        }

        var $navLinks = $('.site-nav ul li a');
        if ($navLinks.length) {
            $navLinks.on('click', function() {
                $hamburger.removeClass('is-active');
            })
        }

    })();

    var smoothScroll = (function() {
        var $targetAnchors = $('.site-nav ul li a');

        if ($targetAnchors.length) {
            $targetAnchors.on("click", function() {
                var $target = $(this.hash);
                $target = $target.length ? $target : $("[name=" + this.hash.slice(1) + "]");
                if ($target.length) {
                    $("html, body").animate({
                        scrollTop: $target.offset().top
                    }, 500);
                    return false;
                }
            });
        }

    })();

    var introSection = (function() {

        $introSection = $('.intro');

        if ($introSection.length) {
            $introSection.addClass('loaded');
        }

    })();

    var gameSection = (function() {

        var $game = $('.game');

        if ($game.length) {
            slideInAtFifty($window, $game);
        }

    })();

    var votingSection = (function() {

        var $vote = $('.vote');

        if ($vote.length) {
            slideInAtFifty($window, $vote);
        }

    })();

    var productSection = (function() {

        var $productInfo = $('.product-info');
        var $pros = $productInfo.find('.pros');
        var $infoLinks = $productInfo.find('.info-links a');
        var $closeOverlayLinks = $productInfo.find('.close');

        if ($productInfo.length) {
            slideInAtFifty($window, $productInfo);
        }

        if ($pros.length) {
            slideInAtCustom($window, $pros, 200);
        }

        if ($infoLinks.length) {
            $infoLinks.on('click', function(e) {
                e.preventDefault();
                var $target = $(this.hash);
                $target.addClass('visible');
            });
        }

        if ($closeOverlayLinks.length) {
            $closeOverlayLinks.on('click', function(e) {
                e.preventDefault();
                var $target = $(this.hash);
                $target.removeClass('visible');
            });
        }

    })();

    var brandSection = (function() {

        var $brand = $('.brand');
        var $logo = $brand.find('.logo');

        if ($brand.length) {
            slideInAtFifty($window, $brand);
        }

        if ($logo.length) {
            slideInAtHundred($window, $logo);
        }

    })();

    var voting = (function() {

        var $images = $('.voting-thanks .shapes .image');

        if ($images.length) {
            $.each($images, function(i, image) {
                $(image).height($(image).width());
            });
        }

    })();

    var game = (function() {

        function setActiveRiddle($elems, count) {
            if (count < 5) {
                $.each($elems, function(i, elem) {
                    var $elem = $(elem);
                    $elem.removeClass('active');
                    if (count === i) {
                        $elem.addClass('active');
                    }
                });
            } else {
                if (solved) {
                    $elems.html(' '); // Empty the riddle while the new page is loading
                    window.location.href = "http://bjornlindholm.dk/kea/randoms/riddles/completed.php";
                } else {
                    window.location.href = "http://bjornlindholm.dk/kea/randoms/riddles/failed.php";
                }
            }
        }

        function setProgress($elems, count) {
            $elems.html(count+1 + '/5');
        }

        function setTimer($elems, $answers, length, callback) {
            $elems.html('60');
            var interval = setInterval(function() {
                length--;
                if (length > 0) {
                    $elems.html(length);
                } else {
                    solved = false;
                    clearInterval(interval);
                    callback();
                }
            }, 1000);
            $answers.on('click', function() {
                clearInterval(interval);
            })
        }

        function checkAnswer(e) {
            if (e && e.currentTarget) {
                if (e.currentTarget.dataset.answer !== 'true') {
                    solved = false;
                }
            }
        }

        function nextRiddle($answers, $progress, $timer, e) {
            checkAnswer(e);
            setActiveRiddle($riddles, count);
            setProgress($progress, count);
            setTimer($timer, $answers, 60, function() {
                nextRiddle($answers, $progress, $timer, count);
            });
            count++;
        }

        var $riddles = $('.riddles .riddle');

        if ($riddles.length) {

            var count = 0;
            var solved = true;

            $answers = $riddles.find('.answers button');
            $progress = $riddles.find('header .progress span');
            $timer = $riddles.find('header .timer span');

            nextRiddle($answers, $progress, $timer, count);

            $answers.on('click', function(e) {
                nextRiddle($answers, $progress, $timer, e);
            })

        }

    })();

});
