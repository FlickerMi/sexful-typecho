	</div>
<?php if (!is_pjax()) { ?>
</div>	
</div>
<script src="<?php $this->options->themeUrl('google_code_prettify.js'); ?>?version=20180316" data-no-instant></script>
<script src="<?php $this->options->themeUrl('instant_click_3.0.1.js'); ?>?version=20180316" data-no-instant></script>
<script src="<?php $this->options->themeUrl('sexful.js'); ?>?version=2018031613" data-no-instant></script>
<a id="scrollUp">Top</a>
<script>
/* 评论表情 */
$(function() {
	var box = $("#smiliesbox"),
		button = $("#smiliesbutton"),
		a = null;
	box.mouseover(function() {
		clearTimeout(a);
		a = null;
	});
	box.find("span").click(function() {
		var b = $(this).attr("data-tag");
		$("#textarea").insert(b);
		button.mouseout();
	});
	button.on({
		click:function() {
			box.fadeIn();
		},
		mouseover:function() {
			box.fadeIn();
		},
		mouseout:function() {
			a = setTimeout(function() {
				box.fadeOut();
				clearTimeout(a);
				a = null
			},100);
		}
	});
	$.fn.extend({
		"insert": function(myValue) {
			var $t = $(this)[0];
			if (document.selection) {
				this.focus();
				sel = document.selection.createRange();
				sel.text = myValue;
				this.focus()
			} else if ($t.selectionStart || $t.selectionStart == "0") {
				var startPos = $t.selectionStart;
				var endPos = $t.selectionEnd;
				var scrollTop = $t.scrollTop;
				$t.value = $t.value.substring(0, startPos) + myValue + $t.value.substring(endPos, $t.value.length);
				this.focus();
				$t.selectionStart = startPos + myValue.length;
				$t.selectionEnd = startPos + myValue.length;
				$t.scrollTop = scrollTop
			} else {
				this.value += myValue;
				this.focus()
			}
		}
	}) 
});
</script>
<span style="display: none;"><script type="text/javascript" data-no-instant>var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5593802'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s96.cnzz.com/stat.php%3Fid%3D5593802' type='text/javascript'%3E%3C/script%3E"));</script></span>
</body>
</html>
<?php } ?>