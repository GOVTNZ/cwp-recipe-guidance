
<h1>$Title</h1>


<%-- main  --%>
<div>

	<p><% if $Description %>$Description<% else %>$MetaDescription<% end_if %></p>
	<p>$LearningOutcomes</p>
	<p>$Content</p>

</div>

<%-- sidebar --%>
<div>
	
	<p><strong>Tags</strong></p>
	<p>
		<ul>
		<% loop $Terms %>
			<li>
				<span class="tag">$Name</span>		
			</li>
		<% end_loop %>
		</ul>
	</p>

	<p>Agency: $Author</p>

	Contact: <a href="mailto:$ContactPointEmail">$ContactPointName</a>

    <p>Last Update: $LastEdited </p>
	

</div>	