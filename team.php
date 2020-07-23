<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "Team - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>

    </head>
    <body class="team-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="team">
            <?php include('./components/covis_banner.php'); ?>
            <div class="background2 bg2">
                <div class="team">
                    <h2 style="color: #2d3e52;">Our Team</h2>
                    <p>We are a charitable non-profit organization run by a dedicated core team based in Vienna with contributions from volunteers around the world.</p>
                </div>
            </div>

            <div class="advisorsdiv">

                <div id="members">

                    <div class="member">
                        <img src="./img/team/peter.png" alt="Peter Kraker">
                        <ul>
                            <li class="name">Peter Kraker</li>
                            <li class="job-title">Founder & Chairman</li>
                            <li class="country"><span class="awesome"><i class="fas fa-location-arrow"></i></span> Vienna</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:pkraker@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a class="contact-icon" target="_blank" href="http://twitter.com/PeterKraker"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="member">
                        <img src="./img/team/maxi.png" alt="Maxi Schramm">
                        <ul>
                            <li class="name">Maxi Schramm</li>
                            <li class="job-title">UX Designer & Treasurer</li>
                            <li class="country"><span class="awesome"><i class="fas fa-location-arrow"></i></span> Vienna</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:maxi@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="member">
                        <img src="./img/team/chris.png" alt="Christopher Kittel">
                        <ul>
                            <li class="name">Christopher Kittel</li>
                            <li class="job-title">Data Scientist & Secretary</li>
                            <li class="country"><span class="awesome"><i class="fas fa-location-arrow"></i></span> Vienna</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:christopher.kittel@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a class="contact-icon" target="_blank" href="http://www.christopherkittel.eu/"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="member">
                        <img src="./img/team/jan.png" alt="Jan Konstant">
                        <ul>
                            <li class="name">Jan Konstant</li>
                            <li class="job-title">Frontend Developer</li>
                            <li class="country"><span class="awesome"><i class="fas fa-location-arrow"></i></span> Vienna</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:jkonstant@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="member">
                        <img src="./img/team/scott.png" alt="Scott Chamberlain">
                        <ul>
                            <li class="name">Scott Chamberlain</li>
                            <li class="job-title">Data Sources</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:scott@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a class="contact-icon" target="_blank" href="http://ropensci.org"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="member">
                        <img src="./img/team/najmeh.png" alt="Najmeh Shaghaei">
                        <ul>
                            <li class="name">Najmeh Shaghaei</li>
                            <li class="job-title">Library Liaison</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:n.shaghaei@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a class="contact-icon" target="_blank" href="https://portal.findresearcher.sdu.dk/da/persons/nas"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="member">
                        <img src="./img/team/thomas.png" alt="Thomas Arrow">
                        <ul>
                            <li class="name">Thomas Arrow</li>
                            <li class="job-title">Frontend Developer</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:tom@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a class="contact-icon" target="_blank" href="https://github.com/tarrow/"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="member">
                        <img src="./img/team/michela.png" alt="Michela Vignoli">
                        <ul>
                            <li class="name">Michela Vignoli</li>
                            <li class="job-title">Community Coordinator</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:mvignoli@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a class="contact-icon" target="_blank" href="https://twitter.com/iea_ioi"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="member">
                        <img src="./img/team/bjorn.png" alt="Bjorn Brembs">
                        <ul>
                            <li class="name">Björn Brembs</li>
                            <li class="job-title">Resident User</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="mailto:brembs@openknowledgemaps.org"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a class="contact-icon" target="_blank" href="http://brembs.net"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="organizational-member">
                        <img src="./img/team/knowcenter.png" alt="Organizational member Know Center">
                        <ul>
                            <li class="name">Know Center</li>
                            <li class="job-title">Organizational member</li>
                        </ul>

                        <ul class="contact-member">
                            <li><a class="contact-icon" target="_blank" href="http://www.know-center.tugraz.at/"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <!-- list of former contributors -->
                    <div class="alumni" style=""><h3>Special thanks to former contributers:</h3>
                        <a target="_blank" class="underline" href="https://twitter.com/asuraenkhbayar">Asura Enkhbayar</a>,
                        <a target="_blank" class="underline" href="https://de.linkedin.com/in/fabian-kraut-01aa31a9">Fabian Kraut</a>,
                        <a target="_blank" class="underline" href="https://twitter.com/rabachleitner">Rainer Bachleitner</a>,
                        <a target="_blank" class="underline" href="https://github.com/jaels">Yael Stein</a>,
                        <a target="_blank" class="underline" href="http://www.michaelskaug.com/">Mike Skaug</a>, 
                        <a target="_blank" class="underline" href="http://nthmost.com/">Naomi Most</a>, 
                        <a target="_blank" class="underline" href="http://www.madgik.di.uoa.gr/content/omiros">Omiros Metaxas</a>
                    </div>
                </div> 
            </div>

            <a name="supporting-members"></a>
            <div class="background2 bg1" style="background-color:white; border-top: 1px solid #cacfd3;">
                <div class="team" id="advisory-board">
                    <h2 style="color: #2d3e52;">Our Supporting Members</h2>
                    <p>are contributing to the financial sustainability of Open Knowledge Maps. <a class="underline" href="supporting-membership">Find out more</a> on how to become a supporting member.</p>
                </div>

                <div id="partnerdiv" style="padding-bottom: 0px; padding-top: 20px;">
                    <h2>Category "Sustaining Members PLUS"</h2>
                    <div class="partners">
                        <?php include($COMPONENTS_PATH . 'sustaining-members-plus.php'); ?>
                    </div>
                </div>

                <div id="partnerdiv" style="padding-bottom: 0px;">
                    <h2>Our current Sustaining Members</h2>
                    <div class="partners">
                        <?php include($COMPONENTS_PATH . 'sustaining-members.php'); ?>
                    </div>
                </div>

                <div id="partnerdiv">
                    <h2>Category "Supporting Members"</h2>
                    <div class="partners">
                        <?php include($COMPONENTS_PATH . 'supporting-members.php'); ?>
                    </div>
                </div>
            </div>     

            <div class="background2 bg1">
                <div class="team" id="advisory-board">
                    <h2 style="color: #2d3e52;">Our Advisors</h2>
                    <p>are guiding the development of Open Knowledge Maps</p>
                </div>

                <div class="advisorsdiv">
                    <div id="advisors">

                        <div class="advisor">
                            <a target="_blank" href="http://contentmine.org"><img class="hoverlink" src="./img/advisors/pmr.jpg" alt="Open Knowledge Maps Advisor Peter Murray-Rust"></a>
                            <h3>Peter Murray-Rust</h3> 
                            <ul class="advisor-desc"><a target="_blank" href="http://contentmine.org">
                                    <li>Founder</li> 
                                    <li>ContentMine</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://know-center.at"><img class="hoverlink" src="./img/advisors/stefanie.jpg" alt="Open Knowledge Maps Advisor Stefanie Lindstaedt"></a>
                            <h3>Stefanie Lindstaedt</h3>
                            <p class="advisor-desc">CEO <br>Know-Center</p>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://www.madgik.di.uoa.gr/content/natalia"><img class="hoverlink" src="./img/advisors/natalia.jpg" alt="Open Knowledge Maps Advisor Natalia Manola"></a>
                            <h3>Natalia Manola</h3>
                            <ul class="advisor-desc">
                                <li>Project Director</li>
                                <li>OpenAIRE</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://www.zbw.eu/"><img class="hoverlink" src="./img/advisors/klaus.jpg" alt="Open Knowledge Maps Advisor Klaus Tochtermann"></a>
                            <h3>Klaus Tochtermann</h3>
                            <ul class="advisor-desc">
                                <li>Director</li>
                                <li>ZBW - Leibniz Information Centre for Economics</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://findresearcher.sdu.dk/portal/da/person/bfd"><img class="hoverlink" src="./img/advisors/bertil.jpg" alt="Open Knowledge Maps Advisor Bertil F. Dorch"></a>
                            <h3>Bertil F. Dorch</h3>
                            <ul class="advisor-desc">
                                <li>Director</li>
                                <li>University Library of Southern Denmark</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://homepage.univie.ac.at/katja.mayer/"><img class="hoverlink" src="./img/advisors/katja.jpg" alt="Open Knowledge Maps Advisor Katja Mayer"></a>
                            <h3>Katja Mayer</h3>
                            <ul class="advisor-desc">
                                <li>Researcher and Lecturer</li>
                                <li>University of Vienna</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://oana.at"><img class="hoverlink" src="./img/advisors/falk.jpg" alt="Open Knowledge Maps Advisor Falk Reckling"></a>
                            <h3>Falk Reckling</h3>
                            <ul class="advisor-desc">
                                <li>Head of Strategy</li>
                                <li>Austrian Science Fund (FWF)</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://www.wikimedia.at/"><img class="hoverlink" src="./img/advisors/claudia.jpg" alt="Open Knowledge Maps Advisor Claudia Gar&aacute;d"></a>
                            <h3>Claudia Gar&aacute;d</h3>
                            <ul class="advisor-desc">
                                <li>Executive Director</li>
                                <li>Wikimedia Österreich</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://www.sub.uni-goettingen.de/en/contact/staff-a-z/staff-details/person/birgit-schmidt/"><img class="hoverlink" src="./img/advisors/birgit.jpg" alt="Open Knowledge Maps Advisor Birgit Schmidt"></a>
                            <h3>Birgit Schmidt</h3>
                            <ul class="advisor-desc">
                                <li>Scientific Manager/Project Coordinator</li>
                                <li>Göttingen State and University Library</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://www.oa.unito.it/"><img class="hoverlink" src="./img/advisors/elena.jpg" alt="Open Knowledge Maps Advisor Elena Giglia"></a>
                            <h3>Elena Giglia</h3>
                            <ul class="advisor-desc">
                                <li>Head of Open Access Office</li>
                                <li>University of Turin</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://twitter.com/EvoMRI"><img class="hoverlink" src="./img/advisors/daniel_m.jpg" alt="Open Knowledge Maps Advisor Daniel Mietchen"></a>
                            <h3>Daniel Mietchen</h3>
                            <ul class="advisor-desc">
                                <li>Senior Researcher</li>
                                <li>University of Virginia</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://www.archivelab.org/"><img class="hoverlink" src="./img/advisors/mek.jpg" alt="Open Knowledge Maps Advisor Michael E. Karpeles"></a>
                            <h3>Michael E. Karpeles</h3>
                            <ul class="advisor-desc">
                                <li>Citizen of the world</li>
                                <li>Internet Archive</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://www.elisabethlex.info/"><img class="hoverlink" src="./img/advisors/elisabeth.jpg" alt="Open Knowledge Maps Advisor Elisabeth Lex"></a>
                            <h3>Elisabeth Lex</h3>
                            <ul class="advisor-desc">
                                <li>Assistant Professor</li>
                                <li>Graz University of Technology</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://isabella-peters.de/"><img class="hoverlink" src="./img/advisors/isabella.jpg" alt="Open Knowledge Maps Advisor Isabella Peters"></a>
                            <h3>Isabella Peters</h3>
                            <ul class="advisor-desc">
                                <li>Professor of Web Science</li>
                                <li>ZBW - Leibniz Information Centre for Economics & Kiel University</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://aldirdiri.strikingly.com/"><img class="hoverlink" src="./img/advisors/osman.jpg" alt="Open Knowledge Maps Advisor Osman Aldirdiri"></a>
                            <h3>Osman Aldirdiri</h3>
                            <ul class="advisor-desc">
                                <li>Executive Committee Member</li>
                                <li>SPARC Africa</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://twitter.com/Lambo"><img class="hoverlink" src="./img/advisors/lambert.jpg" alt="Open Knowledge Maps Advisor Lambert Heller"></a>
                            <h3>Lambert Heller</h3>
                            <ul class="advisor-desc">
                                <li>Librarian</li>
                                <li>German National Library of S&T (TIB)</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://tonyr-h.github.io/"><img class="hoverlink" src="./img/advisors/tony.jpg" alt="Open Knowledge Maps Advisor Tony Ross-Hellauer"></a>
                            <h3>Tony Ross-Hellauer</h3>
                            <ul class="advisor-desc">
                                <li>Senior Researcher</li>
                                <li>Know-Center</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://twitter.com/asuraenkhbayar"><img class="hoverlink" src="./img/advisors/asura.jpg" alt="Open Knowledge Maps Advisor Asura Enkhbayar"></a>
                            <h3>Asura Enkhbayar</h3>
                            <ul class="advisor-desc">
                                <li>PhD student</li>
                                <li>Simon Fraser University</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://informationswissenschaft-wirtschaftsinformatik.uni-graz.at/de/institut/mitarbeiterinnen/schloegl-christian/"><img class="hoverlink" src="./img/advisors/christians.jpg" alt="Open Knowledge Maps Advisor Christian Schlögl"></a>
                            <h3>Christian Schlögl</h3>
                            <p class="advisor-desc">Associate Professor<br>University of Graz</p>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://www.stefankasberger.at/"><img class="hoverlink" src="./img/advisors/stefan.jpg" alt="Open Knowledge Maps Advisor Stefan Kasberger"></a>
                            <h3>Stefan Kasberger</h3>
                            <ul class="advisor-desc">
                                <li>Board Member</li>
                                <li>Open Knowledge Austria</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="http://stefaniehaustein.com/"><img class="hoverlink" src="./img/advisors/stefanieh.jpg" alt="Open Knowledge Maps Advisor Stefanie Haustein"></a>
                            <h3>Stefanie Haustein</h3>
                            <ul class="advisor-desc">
                                <li>Assistant professor</li>
                                <li>University of Ottawa</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://twitter.com/ferli90"><img class="hoverlink" src="./img/advisors/andreas.jpg" alt="Open Knowledge Maps Advisor Andreas Ferus"></a>
                            <h3>Andreas Ferus</h3>
                            <ul class="advisor-desc">
                                <li>Dept. Director</li>
                                <li>Library of the Academy of Fine Arts Vienna</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://twitter.com/christinezhang"><img class="hoverlink" src="./img/advisors/christine.jpg" alt="Open Knowledge Maps Advisor Christine Zhang"></a>
                            <h3>Christine Zhang</h3>
                            <ul class="advisor-desc">
                                <li>OpenNews Fellow</li>
                                <li>Knight-Mozilla</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://twitter.com/sdennerlein"><img class="hoverlink" src="./img/advisors/sebastian.jpg" alt="Open Knowledge Maps Advisor Sebastian Dennerlein"></a>
                            <h3>Sebastian Dennerlein</h3>
                            <ul class="advisor-desc">
                                <li>PhD Student</li>
                                <li>Graz University of Technology</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://nioo.knaw.nl/en/employees/antica-culina"><img class="hoverlink" src="./img/advisors/antica.jpg" alt="Open Knowledge Maps Advisor Antica Culina"></a>
                            <h3>Antica Culina</h3>
                            <ul class="advisor-desc">
                                <li>Postdoc</li>
                                <li>Netherlands Institute of Ecology (NIOO-KNAW)</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://twitter.com/sextus_empirico "><img class="hoverlink" src="./img/advisors/robert.jpg" alt="Open Knowledge Maps Advisor Robert Gutounig"></a>
                            <h3>Robert Gutounig</h3>
                            <ul class="advisor-desc">
                                <li>Head of Degree Programme "Content Strategy"</li>
                                <li>FH JOANNEUM</li>
                            </ul>
                        </div>

                        <div class="advisor">
                            <a target="_blank" href="https://online.boku.ac.at/BOKUonline/visitenkarte.show_vcard?pPersonenId=51947CF9F7441FEF&pPersonenGruppe=3"><img class="hoverlink" src="./img/advisors/daniel.jpg" alt="Open Knowledge Maps Advisor Daniel Dörler"></a>
                            <h3>Daniel Dörler</h3>
                            <ul class="advisor-desc">
                                <li>PhD Student</li>
                                <li>BOKU Vienna</li>
                            </ul>
                        </div> 

                        <div class="advisor">
                            <a target="_blank" href=""><img class="hoverlink" src="./img/advisors/christian.jpg" alt="Open Knowledge Maps Advisor Christian Kaier"></a>
                            <h3>Christian Kaier</h3>
                            <ul class="advisor-desc">
                                <li>Open Access Office</li>
                                <li>University of Graz</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php include($COMPONENTS_PATH . 'partners.php'); ?>
        <?php include($COMPONENTS_PATH . 'networks.php'); ?>
        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>
