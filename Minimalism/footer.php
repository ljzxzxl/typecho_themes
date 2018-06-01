<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
        </div><!-- end .row -->
    </div>
</div><!-- end #body -->
<div class="return-top">
	<a href="javascript:;" class="triangle" title="回顶部">
		<i class="triangle-up"></i>
	</a>
</div>
<footer id="footer" role="contentinfo">
	&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> | 沪ICP备14044094号-1 | Theme By <a href="https://github.com/WarnerYang/typecho_themes">Minimalism</a>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
<script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
<script type="text/javascript">
    $.fn.popImg = function() {

        var $layer = $("<div/>").css({
            position: "fixed",
            left: 0,
            right: 0,
            top: 0,
            bottom: 0,
            height: "100%",
            width: "100%",
            zIndex: 9999999,
            background: "#000",
            opacity: "0.6",
            display: "none"
        }).attr("data-id", "b_layer");

        var cloneImg = function($node) {
            var left = $node.offset().left;
            var top = $node.offset().top - $(document).scrollTop();
            var nodeW = $node.width();
            var nodeH = $node.height();
            return $node.clone().css({
                position: "fixed",
                width: nodeW,
                height: nodeH,
                left: left,
                top: top,
                zIndex: 10000000
            });
        };

        var justifyImg = function($c) {
            var dW = $(window).width();
            var dH = $(window).height();
            $c.css("cursor", "zoom-out").attr("data-b-img", 1);
            var img = new Image();
            img.onload = function(){
                $c.stop().animate({
                    width: this.width,
                    height: this.height,
                    left: (dW - this.width) / 2,
                    top: (dH - this.height) / 2
                }, 300);
            };
            img.src = $c.attr("src");
        };

        this.each(function(){
            $(this).css("cursor", "zoom-in").on("click", function(){
                var $b = $("body");
                $layer.appendTo($b);
                $layer.fadeIn(300);
                var $c = cloneImg($(this));
                $c.appendTo($b);
                justifyImg($c);
            });
        });

        var timer = null;
        $(window).on("resize", function(){
            $("img[data-b-img]").each(function(){
                var $this = $(this);
                timer && clearTimeout(timer);
                timer = setTimeout(function(){
                    justifyImg($this);
                }, 10);
            });
        });

        $(window).on("click keydown", function(evt){
            if(evt.type == "keydown" && evt.keyCode === 27) {
                $layer.fadeOut(300);
                $("img[data-b-img]").remove();
            }
            var $this = $(evt.target);
            if($this.attr("data-id") == "b_layer" || $this.attr("data-b-img") == 1) {
                $layer.fadeOut(300);
                $("img[data-b-img]").remove();
            }
        });

    };
    $(function(){ $(".container img").popImg(); });
</script>
</body>
</html>
