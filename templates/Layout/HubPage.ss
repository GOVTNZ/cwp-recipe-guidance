<% include Breadcrumbs %>
<div>
    <div>
        <h1>$Title</h1>
    </div>
    <div>
        <% if $Children %>
        <ul>
            <% loop $Children %>
            <li class="link">
                <div>
                    <a href="$Link">
                        <h2>$Title</h2>
                    </a>
                    $Description
                    <% loop $Terms %>
                        $Name
                    <% end_loop %>
                </div>
            </li>
            <% end_loop %>
        </ul>
        <% end_if %>
    </div>
</div>




