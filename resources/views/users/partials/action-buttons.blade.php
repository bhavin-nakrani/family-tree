<div class="pull-right">
    <ul class="nav nav-tabs">

        <li role="presentation" class="{{ Request::segment(3) == null ? 'active' : '' }}">
            {{ link_to_route('users.show', trans('app.show_profile'), [$user->id]) }}
        </li>
        <li role="presentation" class="{{ Request::segment(3) == 'chart' ? 'active' : '' }}">
        {{ link_to_route('users.chart', trans('app.show_family_chart'), [$user->id]) }}
        </li>
        <li role="presentation" class="{{ Request::segment(3) == 'tree' ? 'active' : '' }}">
        {{ link_to_route('users.tree', trans('app.show_family_tree'), [$user->id]) }}
        </li>
        <li role="presentation" class="{{ Request::segment(3) == 'marriages' ? 'active' : '' }}">
        {{ link_to_route('users.marriages', trans('app.show_marriages'), [$user->id]) }}
        </li>
    </ul>
</div>
