<footer id="mw-footer">
	<div class="container">
	 <div id="footer-wordmark">
	  <a href="//docs.webplatform.org/wiki/Template:CC-by-3.0" class="license">
	    <img src="//docs.webplatform.org/w/skins/webplatform/images/cc-by-black.svg" alt="Content available under CC-BY, except where otherwise noted.">
	  </a>
	  <a href="//www.webplatform.org/"><span id="footer-title">WebPlatform<span id="footer-title-light">.org</span></span></a>
	 </div>
	  <ul class="stewards">
	    <li class="steward-w3c"><a href="//www.webplatform.org/stewards/w3c">W3C</a></li>
	    <li class="steward-adobe"><a href="//www.webplatform.org/stewards/adobe">Adobe</a></li>
	    <li class="steward-facebook"><a href="//www.webplatform.org/stewards/facebook">facebook</a></li>
	    <li class="steward-google"><a href="//www.webplatform.org/stewards/google">Google</a></li>
	    <li class="steward-hp"><a href="//www.webplatform.org/stewards/hp">HP</a></li>
	    <li class="steward-intel"><a href="//www.webplatform.org/stewards/intel">Intel</a></li>
	    <li class="steward-microsoft"><a href="//www.webplatform.org/stewards/microsoft">Microsoft</a></li>
	    <li class="steward-mozilla"><a href="//www.webplatform.org/stewards/mozilla">Mozilla</a></li>
	    <li class="steward-nokia"><a href="//www.webplatform.org/stewards/nokia">Nokia</a></li>
	    <li class="steward-opera"><a href="//www.webplatform.org/stewards/opera">Opera</a></li>
	  </ul>
	</div>
	<?php if (TBGContext::isDebugMode() && TBGLogging::isEnabled()): ?>
		<div id="tbg___DEBUGINFO___" style="position: fixed; bottom: 0; left: 0; z-index: 100; display: none; width: 100%;">
		</div>
		<?php echo image_tag('spinning_16.gif', array('style' => 'position: fixed; bottom: 5px; right: 23px;', 'id' => 'tbg___DEBUGINFO___indicator')); ?>
		<?php echo image_tag('debug_show.png', array('style' => 'position: fixed; bottom: 5px; right: 3px; cursor: pointer;', 'onclick' => "$('tbg___DEBUGINFO___').toggle();", 'title' => 'Show debug bar')); ?>
	<?php endif; ?>
</footer>
