

This is the hub page template


<h1>$Title</h1>


    <% if $Children %>
    <ul>
        <% loop $Children %>

        <li>
            <span>$Title</span>

        <% end_loop %>

    </ul>
    <% end_if %>


