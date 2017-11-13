
<h1>$Title</h1>


<%-- main  --%>
<div>

	<p>$Description</p>
	<p>$Content</p>

</div>

<%-- sidebar --%>
<div>
	
	<p><strong>Audience</strong></p>
	<p>
	<%-- todo: check if any items under this Term  --%>
	<ul>
	<% loop $Terms %>
		<% if $Type.Name == 'Audience' %>
			<li>
				<span class="tag">$Name</span>		
			</li>
		<% end_if %>
	<% end_loop %>
	</ul>

	
	<p><strong>Type of Data</strong></p>
	<p>
	<%-- todo: check if any items under this Term  --%>
	<ul>
	<% loop $Terms %>
		<% if $Type.Name == 'Type of Data' %>
			<li>
				<span class="tag">$Name</span> 
			</li>
		<% end_if %>
	<% end_loop %>
	</ul>

	<p><strong>Quality Dimension</strong></p>
	<p>
	<%-- todo: check if any items under this Term  --%>
	<ul>
	<% loop $Terms %>
		<% if $Type.Name == 'Quality Dimension' %>
			<li>
				<span class="tag">$Name</span> 
			</li>
		<% end_if %>
	<% end_loop %>
	</ul>

	<p>$Outcomes</p>

	<p>$DetailedAdvice</p>

	<p>$Tools</p>

	<p>$RelatedAdvice</p>

	<p>$Type</p>


	<p>$Status</p>

	<p>$Compliance</p>

	<%-- temp: Depreciated? --%>
	<pre>Depreciated?</pre>
	<p>$LongDescription</p>
	<p>$ShortName</p> 

</div>	