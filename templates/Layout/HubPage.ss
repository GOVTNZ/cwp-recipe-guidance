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
                    <a href="$link">
                        <h2>$Title</h2>
                    </a>
                    <p>Description $Description</p>
                    <p>Tags from taxonomy term $Tags</p>

                </div>
            </li>
            <% end_loop %>
        </ul>
        <% end_if %>
    </div>
</div>




