<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>RiX (Resource Interactive eXplorer)</strong></div>

                <div class="panel-body">
                   <p> Acest proiect se doreste a fi un instrument Web de colectare, de regasire si de vizualizare a informatiilor referitoare la resurse stiintifice si/sau tehnologice (articole, carti, rapoarte tehnice, prezentari, cod-sursa si altele) ale utilizatorilor din domeniul informaticii. </p>
                   <p>Dezvoltand o aplicatie de tip mash-up, se vor oferi informatii de interes pentru o anumita persoana, pornind de la resursele multimedia deja colectate si clasificate (eventual, prin tagging) via aplicatii Web sociale precum Feedly, GitHub, Google Scholar, Lynrd, Pocket, Slideshare, Vimeo etc.</p><p> Informatiile (structurate pe diverse criterii) vor fi vizualizate/redate in formate precum HTML, SVG sau text obisnuit. De asemenea, sistemul va oferi acces la informatii prin intermediul unui API REST.
                   </p>
                </div>
            </div>


             <div class="panel panel-default">
                <div class="panel-heading"><strong>Realizare</strong></div>

                <div class="panel-body">
                   <p> Realizatori: <ul><li>Nastasa Bogdan-Vlad</li><li>Pascaru Stefan-Narcis</li><li>Stefan Cristian</li><li>Timofte Samuel</li></ul> </p>
                   <p>Aplicatii Web sociale folosite: <ul> <li>Feedly</li><li> GitHub</li> <li>Slideshare</li> <li> Vimeo</li></ul></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>