<h1>This is customer update page</h1>

@if ($customerAssets->site_progress === "true" && $customerAssets->legal_document === "true")
        <h1>This is gold</h1>
 @elseif ($customerAssets->site_progress === "true" )
    <h1>This is silver </h1>
    
@endif