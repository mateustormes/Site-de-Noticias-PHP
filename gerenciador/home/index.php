<?php include 'headerGerenciador.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i><span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../home/">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Notícias</a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
<h2 class="mb-4">Mateus TOrmes #01</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<div class='tableauPlaceholder' id='viz1654998823600' style='position: relative'>
    <noscript>
        <a href='#'>
            <img alt='Painel 1 ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;J3&#47;J38FJ94YF&#47;1_rss.png' style='border: none' />
        </a>
    </noscript>
    <object class='tableauViz'  style='display:none;'>
        <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> 
        <param name='embed_code_version' value='3' /> 
        <param name='path' value='shared&#47;J38FJ94YF' /> 
        <param name='toolbar' value='yes' />
        <param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;J3&#47;J38FJ94YF&#47;1.png' /> 
        <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' />
        <param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en-US' />
        <param name='filter' value='publish=yes' />
    </object>
</div>                
<script type='text/javascript'>                    
    var divElement = document.getElementById('viz1654998823600');                    
    var vizElement = divElement.getElementsByTagName('object')[0];                    
    if ( divElement.offsetWidth > 800 ) { 
        vizElement.style.width='100%';
        vizElement.style.height='1051px';
    } else if ( divElement.offsetWidth > 500 ) { 
        vizElement.style.width='100%';
        vizElement.style.height='1051px';
    } else { 
        vizElement.style.width='100%';
        vizElement.style.height='1327px';
    }                     
    var scriptElement = document.createElement('script');                    
    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    
    vizElement.parentNode.insertBefore(scriptElement, vizElement);                
</script>
<?php include 'footerGerenciador.php'; ?>