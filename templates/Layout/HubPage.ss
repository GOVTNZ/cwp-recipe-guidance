<% include Breadcrumbs %>
<div class="hub-page">
    <div>
        <h1>$Title</h1>
    </div>
    <div>
        <% if $Children %>
        <ul>
            <% loop $Children %>
            <li>
                <div>
                    <a href="$link">
                        <h2>$Title</h2>
                        <p>Description $Description</p>
                        <p>Tags from taxonomy term $Tags</p>
                    </a>
                </div>
            </li>
            <% end_loop %>
        </ul>
        <% end_if %>
    </div>
</div>



