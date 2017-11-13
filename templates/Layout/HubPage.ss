
This is the hub page

<%-- feature images should only be shown on top-level hub pages and if there is anything to display. --%>

<div class="feature-image">
    <% if $FeaturedImageText %>
    <p class="sr-only">$FeaturedImageText</p>
    <% end_if %>
</div>


<% include Breadcrumbs %>

<div class="container hub-page-container page-content class-$ClassName" id="toplink">
    <div class="row title-row">
        <div class="col-md-8 col-md-offset-1">
            <h1>$Title</h1>
        </div>
    </div>

    <div class="row main-row">
        <div class="col-md-8 col-md-offset-1">

            <% if $Children %>
            <ul class="links-list accordion-list">
                <% loop $Children %>
                <% if $ClassName == 'SubHubPage' %>
                <% if $Children %>
                <li>
                    <details class="accordion-item">
                        <summary class="accordion-item-button accordion-trigger">
                            <h2>
                                <span class="accordion-title">$Title</span>
                                <span class="accordion-open" style="display: inline;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <span class="accordion-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            </h2>
                        </summary>
                        <div class="accordion-content">
                            <ul>
                                <% loop $Children %>
                                <li class="subhub-child">
                                    <h3 class="imitate-h4">
                                        <a href="$Link">$Title</a>
                                    </h3>
                                    <p>$Description</p>
                                </li>
                                <% end_loop %></ul>
                        </div>
                    </details>
                </li>
                <% end_if %>
                <% else %>
                <li class="link">
                    <div class="accordion-item">
                        <a href="$link">
                            <h2 class="imitate-h4">
                                <span>$Title</span>
                            </h2>
                        </a>
                        <p class="sr-only">$Description</p>
                    </div>
                </li>
                <% end_if %>
                <% end_loop %>
            </ul>
            <% end_if %>
        </div>
    </div>

    <div class="row bottom-row">
        <div class="col-md-8 col-md-offset-1">
        </div>
    </div>
</div>




