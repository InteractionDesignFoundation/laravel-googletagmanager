@if($enabled)
@if($environmentEnabled)
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={!! $id . $environmentAddition !!}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@else
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $id }}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@endif
@endif
