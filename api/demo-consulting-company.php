<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Our Expert Team - Aestimo Pro Consult | Chartered Accountants & Tax Professionals</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Aestimo Pro Consult">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description"
        content="Meet our expert team of chartered accountants and tax professionals at Aestimo Pro Consult. Licensed professionals with international experience and local expertise across Africa.">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://aestimoproconsult.vercel.app/demo-consulting-company">
    <meta property="og:title"
        content="Our Expert Team - Aestimo Pro Consult | Chartered Accountants & Tax Professionals">
    <meta property="og:description"
        content="Meet our expert team of chartered accountants and tax professionals at Aestimo Pro Consult. Licensed professionals with international experience and local expertise across Africa.">
    <meta property="og:image" content="https://aestimoproconsult.vercel.app/images/demo-consulting.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Aestimo Pro Consult - Professional Accounting & Tax Services Team">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://aestimoproconsult.vercel.app/demo-consulting-company">
    <meta name="twitter:title"
        content="Our Expert Team - Aestimo Pro Consult | Chartered Accountants & Tax Professionals">
    <meta name="twitter:description"
        content="Meet our expert team of chartered accountants and tax professionals at Aestimo Pro Consult. Licensed professionals with international experience and local expertise across Africa.">
    <meta name="twitter:image" content="https://aestimoproconsult.vercel.app/images/demo-consulting.jpg">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="css/vendors.min.css" />
    <link rel="stylesheet" href="css/icon.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="demos/consulting/consulting.css" />
    <style>
        .team-member-card {
            transition: all 0.4s ease;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .team-member-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .team-member-image {
            position: relative;
            overflow: hidden;
        }

        .team-member-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .team-member-card:hover .team-member-image img {
            transform: scale(1.05);
        }

        .team-member-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(64, 64, 64, 0.8) 0%, rgba(64, 64, 64, 0.9) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .team-member-card:hover .team-member-overlay {
            opacity: 1;
        }

        .view-details-btn {
            color: white;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            padding: 12px 25px;
            border: 2px solid white;
            border-radius: 30px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .view-details-btn:hover {
            background: white;
            color: #404040;
        }

        .team-member-info {
            padding: 25px 20px;
            text-align: center;
            min-height: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .team-member-name {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .team-member-role {
            font-size: 14px;
            color: #dd6531;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .click-indicator {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .team-member-card:hover .click-indicator {
            background: #404040;
            color: white;
        }

        /* Modal Styles */
        .team-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }

        .team-modal-content {
            background-color: #fefefe;
            margin: 2% auto;
            padding: 0;
            border-radius: 15px;
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: modalSlideIn 0.4s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #dd6531 0%, #c55a42 100%);
            color: white;
            padding: 30px;
            border-radius: 15px 15px 0 0;
            position: relative;
        }

        .modal-body {
            padding: 30px;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 20px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .close-modal:hover {
            opacity: 0.7;
        }

        .modal-team-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .expertise-tag {
            display: inline-block;
            background: #f8f9fa;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 20px;
            font-size: 13px;
            border: 1px solid #e9ecef;
            font-weight: 500;
        }

        .contact-info a {
            color: #404040;
            text-decoration: none;
            font-weight: 500;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .team-member-card {
                margin-bottom: 30px;
            }

            .team-modal-content {
                margin: 5% auto;
                width: 95%;
            }

            .modal-header,
            .modal-body {
                padding: 20px;
            }
        }
    </style>
</head>

<body data-mobile-nav-style="classic">
    <?php include dirname(__DIR__) . '/layouts/header.php'; ?>
    <!-- start page title -->
    <section class="page-title-big-typography bg-dark-gray ipad-top-space-margin xs-py-0"
        data-parallax-background-ratio="0.5"
        style="background-image: url(https://images.pexels.com/photos/7706933/pexels-photo-7706933.jpeg)">
        <div class="opacity-light bg-dark-gray"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center small-screen">
                <div class="col-lg-8 col-md-10 position-relative text-center page-title-extra-small"
                    data-anime='{ "el": "childs", "rotateX": [90, 0], "opacity": [0,1], "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h1 class="mb-5px alt-font text-white"><span class="opacity-6">Professional Excellence</span></h1>
                    <h2 class="mb-0 text-white alt-font ls-minus-2px text-shadow-double-large fw-500">Our Expert Team
                    </h2>
                    <p class="text-white opacity-7 fs-18 mt-10px mb-0">Chartered Accountants & Tax Professionals with
                        International Experience</p>
                </div>
                <div class="down-section text-center"
                    data-anime='{ "translateY": [100, 0], "opacity": [0,1], "easing": "easeOutQuad" }'>
                    <a href="#down-section" class="section-link">
                        <div class="fs-30 sm-fs-32 text-white">
                            <i class="bi bi-mouse"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <!-- start section -->
    <section id="down-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-8">
                <div class="col-lg-8 col-md-10">
                    <h2 class="fw-600 text-dark-gray ls-minus-2px mb-25px"
                        data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        The driving force behind Aestimoproconsult</h2>
                    <p class="fs-18 lh-32"
                        data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        Our exceptional team of chartered accountants, tax professionals, and finance specialists brings
                        together decades of combined experience from leading institutions across Africa, Europe, and the
                        United States. Each member contributes unique expertise and deep local market understanding to
                        deliver world-class financial solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start team section -->
    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center"
                data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 200, "easing": "easeOutQuad" }'>

                <!-- Nathaniel Topp Yankah -->
                <div class="col-lg-4 col-md-6 col-sm-8 mb-50px">
                    <div class="team-member-card" onclick="openModal('nathaniel')">
                        <div class="team-member-image">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=500&fit=crop&crop=face"
                                alt="Nathaniel Topp Yankah" />
                            <div class="team-member-overlay">
                                <a href="#" class="view-details-btn">
                                    View Details
                                    <i class="feather icon-feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h4 class="team-member-name">Nathaniel Topp Yankah</h4>
                            <span class="team-member-role">Partner, Accounting</span>
                        </div>
                    </div>
                </div>

                <!-- Prince Avornorkadzi -->
                <div class="col-lg-4 col-md-6 col-sm-8 mb-50px">
                    <div class="team-member-card" onclick="openModal('prince')">
                        <div class="team-member-image">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=500&fit=crop&crop=face"
                                alt="Prince Avornorkadzi" />
                            <div class="team-member-overlay">
                                <a href="#" class="view-details-btn">
                                    View Details
                                    <i class="feather icon-feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h4 class="team-member-name">Prince Avornorkadzi</h4>
                            <span class="team-member-role">Partner, Tax</span>
                        </div>
                    </div>
                </div>

                <!-- Emmanuel Komlan Tengue -->
                <div class="col-lg-4 col-md-6 col-sm-8 mb-50px">
                    <div class="team-member-card" onclick="openModal('emmanuel')">
                        <div class="team-member-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face"
                                alt="Emmanuel Komlan Tengue" />
                            <div class="team-member-overlay">
                                <a href="#" class="view-details-btn">
                                    View Details
                                    <i class="feather icon-feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h4 class="team-member-name">Emmanuel Komlan Tengue</h4>
                            <span class="team-member-role">Chartered Accountant</span>
                        </div>
                    </div>
                </div>

                <!-- Evans Kofi Adanya -->
                <div class="col-lg-4 col-md-6 col-sm-8 mb-50px">
                    <div class="team-member-card" onclick="openModal('evans')">
                        <div class="team-member-image">
                            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=500&fit=crop&crop=face"
                                alt="Evans Kofi Adanya" />
                            <div class="team-member-overlay">
                                <a href="#" class="view-details-btn">
                                    View Details
                                    <i class="feather icon-feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h4 class="team-member-name">Evans Kofi Adanya</h4>
                            <span class="team-member-role">Finance Specialist</span>
                        </div>
                    </div>
                </div>

                <!-- Joshua Yanzu Peterkin -->
                <div class="col-lg-4 col-md-6 col-sm-8 mb-50px">
                    <div class="team-member-card" onclick="openModal('joshua')">
                        <div class="team-member-image">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=500&fit=crop&crop=face"
                                alt="Joshua Yanzu Peterkin" />
                            <div class="team-member-overlay">
                                <a href="#" class="view-details-btn">
                                    View Details
                                    <i class="feather icon-feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-member-info">
                            <h4 class="team-member-name">Joshua Yanzu Peterkin</h4>
                            <span class="team-member-role">Chartered Accountant & Tax Practitioner</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end team section -->

    <!-- Team Member Modals -->

    <!-- Nathaniel Modal -->
    <div id="nathaniel-modal" class="team-modal">
        <div class="team-modal-content">
            <div class="modal-header text-center">
                <span class="close-modal" onclick="closeModal('nathaniel')">&times;</span>
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop&crop=face"
                    alt="Nathaniel Topp Yankah" class="modal-team-image" />
                <h3 class="mb-10px">Nathaniel Topp Yankah</h3>
                <p class="fs-18 mb-0 opacity-8">Partner, Accounting</p>
            </div>
            <div class="modal-body">
                <div class="contact-info mb-20px">
                    <a href="mailto:nathaniel.yankah@gmail.com" class="me-20px"><i
                            class="feather icon-feather-mail me-5px"></i>nathaniel.yankah@gmail.com</a>
                    <a href="tel:+233549588298"><i class="feather icon-feather-phone me-5px"></i>+233 54 958 8298</a>
                </div>

                <p class="mb-20px lh-32">Nathaniel started his accounting career as a trainee management accountant at
                    the Nottingham City Council and worked in several industries spanning from manufacturing to
                    non-profit in the United Kingdom. He returned to Ghana in 2010 to work as Financial Controller and
                    Chief Finance Officer in several businesses including Managed Healthcare Company Ltd, Resolute
                    Consult, Feniks and Burger King Ghana.</p>

                <div class="mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-15px">Specialties:</h5>
                    <span class="expertise-tag">Bookkeeping</span>
                    <span class="expertise-tag">Financial Reporting</span>
                    <span class="expertise-tag">Tax Planning & Administration</span>
                    <span class="expertise-tag">Accounting Software Migration</span>
                    <span class="expertise-tag">Management Accounting</span>
                </div>

                <div>
                    <h5 class="fw-600 text-dark-gray mb-15px">Qualifications:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>Member, Association of Chartered Certified Accountants (ACCA), UK</li>
                        <li>Currently studying to be a member of Institute of Chartered Tax Accountants, Ghana</li>
                        <li>BSc Administration (Accounting Major), University of Ghana Business School</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Prince Modal -->
    <div id="prince-modal" class="team-modal">
        <div class="team-modal-content">
            <div class="modal-header text-center">
                <span class="close-modal" onclick="closeModal('prince')">&times;</span>
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop&crop=face"
                    alt="Prince Avornorkadzi" class="modal-team-image" />
                <h3 class="mb-10px">Prince Avornorkadzi</h3>
                <p class="fs-18 mb-0 opacity-8">Partner, Tax</p>
            </div>
            <div class="modal-body">
                <div class="contact-info mb-20px">
                    <a href="mailto:avonomanprince@gmail.com" class="me-20px"><i
                            class="feather icon-feather-mail me-5px"></i>avonomanprince@gmail.com</a>
                    <a href="tel:+233545648343"><i class="feather icon-feather-phone me-5px"></i>+233 54 5648 343</a>
                </div>

                <p class="mb-20px lh-32">Prince is a Chartered Accountant and Chartered Tax Professional with 8 years of
                    experience in providing accounting support, internal control reviews, financial due diligence,
                    valuation, tax and assurance services. He has extensive experience in senior finance roles across
                    FMCG manufacturing, food and beverages, real estate and tourism industries.</p>

                <div class="mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-15px">Key Experience:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>Head of Finance, Weddi Africa Limited (3 years) - designed and implemented accounting and
                            financial management policies</li>
                        <li>Management team member, SIA QSR Ghana Limited (Servair subsidiary) - introduced Burger King
                            Franchise in West and East Africa</li>
                        <li>Currently Group CFO, HDG Group - responsible for Kumasi Airport City development</li>
                    </ul>
                </div>

                <div>
                    <h5 class="fw-600 text-dark-gray mb-15px">Qualifications:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>Chartered Accountant (CA), Institute of Chartered Accountants, Ghana</li>
                        <li>Chartered Tax Professional, Chartered Institute of Taxation, Ghana</li>
                        <li>Bachelor's in Administration (Accounting), University of Ghana Business School</li>
                        <li>MBA, University of East London, UK</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Emmanuel Modal -->
    <div id="emmanuel-modal" class="team-modal">
        <div class="team-modal-content">
            <div class="modal-header text-center">
                <span class="close-modal" onclick="closeModal('emmanuel')">&times;</span>
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=face"
                    alt="Emmanuel Komlan Tengue" class="modal-team-image" />
                <h3 class="mb-10px">Emmanuel Komlan Tengue</h3>
                <p class="fs-18 mb-0 opacity-8">Chartered Accountant</p>
            </div>
            <div class="modal-body">
                <p class="mb-20px lh-32">Emmanuel is a dual-qualified Chartered Accountant with membership at both ACCA
                    (UK) and ICAG (Ghana). He brings extensive experience from banking, investment banking, and
                    multinational corporations. Currently serves as Regional Accountant for Align Technology's Africa
                    division, overseeing operations across 8 African countries.</p>

                <div class="mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-15px">Key Achievements:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>Led merger analysis for Dannex, Ayrton, and Starwin pharmaceutical companies at Sentinel
                            Global Advisers</li>
                        <li>Spearheaded cost-saving initiatives at General Electric Oil and Gas resulting in over $1
                            million savings</li>
                        <li>Implemented tax compliance measures leading to $2 million tax refunds from Ghana Revenue
                            Authority</li>
                        <li>Regional oversight of Align Technology operations across Ghana, Nigeria, Kenya, South
                            Africa, Morocco, Tunisia, Algeria, and Egypt</li>
                    </ul>
                </div>

                <div class="mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-15px">Expertise:</h5>
                    <span class="expertise-tag">Financial Modeling</span>
                    <span class="expertise-tag">Business Valuations</span>
                    <span class="expertise-tag">Due Diligence</span>
                    <span class="expertise-tag">Transfer Pricing</span>
                    <span class="expertise-tag">Bilingual (English/French)</span>
                </div>

                <div>
                    <h5 class="fw-600 text-dark-gray mb-15px">Qualifications:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>Chartered Accountant (ACCA), UK</li>
                        <li>Chartered Accountant (ICAG), Ghana</li>
                        <li>Bachelor's in Business Administration (Accounting), University of Ghana</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Evans Modal -->
    <div id="evans-modal" class="team-modal">
        <div class="team-modal-content">
            <div class="modal-header text-center">
                <span class="close-modal" onclick="closeModal('evans')">&times;</span>
                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=400&fit=crop&crop=face"
                    alt="Evans Kofi Adanya" class="modal-team-image" />
                <h3 class="mb-10px">Evans Kofi Adanya</h3>
                <p class="fs-18 mb-0 opacity-8">Finance Specialist</p>
            </div>
            <div class="modal-body">
                <p class="mb-20px lh-32">Evans is currently pursuing an MBA at Stanford Graduate School of Business
                    (GSB) in the United States. He is a chartered accountant and expert in corporate and project finance
                    modeling, with extensive experience in landmark infrastructure projects across emerging markets
                    spanning energy, midstream gas, transport, and ICT sectors.</p>

                <div class="mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-15px">Major Project Achievements:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>Built financial model to raise approximately $1.0 billion for construction of thermal power
                            plants, gas processing plant and Ghana's longest privately owned natural gas pipeline</li>
                        <li>Led Africa's first asset recycling project - $100 million to fund new public infrastructure
                            in The Gambia</li>
                        <li>Contributed to $320 million terrestrial fiber network development aimed at connecting
                            approximately 200 million people across 11 countries</li>
                    </ul>
                </div>

                <div class="mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-15px">Specializations:</h5>
                    <span class="expertise-tag">Corporate Finance Modeling</span>
                    <span class="expertise-tag">Project Finance</span>
                    <span class="expertise-tag">Infrastructure Development</span>
                    <span class="expertise-tag">Private Equity</span>
                </div>

                <div>
                    <h5 class="fw-600 text-dark-gray mb-15px">Education & Certifications:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>MBA Student, Stanford Graduate School of Business (GSB), USA</li>
                        <li>Chartered Accountant</li>
                        <li>Infrastructure Project Finance Certificate, Global Academy of Finance and Management</li>
                        <li>Financial Modeling Certificate, Wall Street Prep</li>
                        <li>Member, Stanford GSB Private Equity Club and AfricaBusinessClub</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Joshua Modal -->
    <div id="joshua-modal" class="team-modal">
        <div class="team-modal-content">
            <div class="modal-header text-center">
                <span class="close-modal" onclick="closeModal('joshua')">&times;</span>
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop&crop=face"
                    alt="Joshua Yanzu Peterkin" class="modal-team-image" />
                <h3 class="mb-10px">Joshua Yanzu Peterkin</h3>
                <p class="fs-18 mb-0 opacity-8">Chartered Accountant & Tax Practitioner</p>
            </div>
            <div class="modal-body">
                <p class="mb-20px lh-32">Joshua is a Chartered Accountant and Chartered Tax Practitioner with over 5
                    years of experience in accounting, taxation, and finance. He specializes in financial reporting,
                    best management practices, accounting for start-ups and non-profit organizations, and providing tax
                    advice to both domestic and commercial clients.</p>

                <div class="mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-15px">Current Role & Experience:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>Currently works with Social Security and National Insurance, managing rent receivables with
                            prior experience in branch operations</li>
                        <li>Finance manager for individual and corporate clients offering wide range of services from
                            statutory compliance to industry best practices</li>
                        <li>Well-versed with current economic and financial trends, keeping clients updated with current
                            industrial news</li>
                    </ul>
                </div>

                <div class="mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-15px">Specializations:</h5>
                    <span class="expertise-tag">Financial Reporting</span>
                    <span class="expertise-tag">Start-up Accounting</span>
                    <span class="expertise-tag">Non-profit Organizations</span>
                    <span class="expertise-tag">Tax Advisory</span>
                    <span class="expertise-tag">Regulatory Compliance</span>
                </div>

                <div>
                    <h5 class="fw-600 text-dark-gray mb-15px">Qualifications:</h5>
                    <ul class="list-style-02 ps-0">
                        <li>Chartered Accountant</li>
                        <li>Chartered Tax Practitioner</li>
                        <li>First Degree in Accounting, University of Ghana Business School, Legon</li>
                        <li>MBA in Finance, University of Ghana Business School, Legon</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- start section -->
    <section class="bg-very-light-gray">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-md-10 mb-6">
                    <h3 class="alt-font fw-600 text-dark-gray ls-minus-1px mb-20px">Combined Expertise</h3>
                    <p class="fs-18 lh-32 mb-35px">Our team brings together decades of combined experience from leading
                        institutions across Africa, Europe, and the United States, ensuring world-class service delivery
                        with deep local market understanding.</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 text-center"
                        data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 200, "easing": "easeOutQuad" }'>
                        <!-- start counter item -->
                        <div class="col mb-30px">
                            <h2 class="alt-font fw-600 text-dark-gray ls-minus-2px mb-5px counter" data-speed="2000"
                                data-to="50">50</h2>
                            <span class="fs-16 fw-500 text-dark-gray alt-font">Years Combined Experience</span>
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col mb-30px">
                            <h2 class="alt-font fw-600 text-dark-gray ls-minus-2px mb-5px">5</h2>
                            <span class="fs-16 fw-500 text-dark-gray alt-font">Chartered Professionals</span>
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col mb-30px">
                            <h2 class="alt-font fw-600 text-dark-gray ls-minus-2px mb-5px">15+</h2>
                            <span class="fs-16 fw-500 text-dark-gray alt-font">Industries Served</span>
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col mb-30px">
                            <h2 class="alt-font fw-600 text-dark-gray ls-minus-2px mb-5px">8</h2>
                            <span class="fs-16 fw-500 text-dark-gray alt-font">African Countries</span>
                        </div>
                        <!-- end counter item -->
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-12 text-center">
                    <a href="/demo-consulting-contact"
                        class="btn btn-large btn-dark-gray btn-box-shadow btn-round-edge">
                        Connect with our team
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <?php include dirname(__DIR__) . '/layouts/footer.php'; ?>
    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div>
    <!-- end scroll progress -->

    <!-- Modal JavaScript -->
    <script>
        function openModal(teamMember) {
            document.getElementById(teamMember + '-modal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(teamMember) {
            document.getElementById(teamMember + '-modal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside of it
        window.onclick = function (event) {
            if (event.target.classList.contains('team-modal')) {
                event.target.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        };

        // Close modal with Escape key
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                var modals = document.querySelectorAll('.team-modal');
                modals.forEach(function (modal) {
                    if (modal.style.display === 'block') {
                        modal.style.display = 'none';
                        document.body.style.overflow = 'auto';
                    }
                });
            }
        });
    </script>

    <!-- javascript libraries -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/vendors.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>