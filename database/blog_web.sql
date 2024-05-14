-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 12:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_body` longtext NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_body`, `blog_image`, `category`, `author_id`, `publish_date`) VALUES
(41, 'IPL 2024: Mayank Yadav Clocks 156.7 kmph, Says ‘My Goal Is To Play for Country’', '<p>On the back of an excellent debut in the 2024&nbsp;<a href=\"https://www.thequint.com/indian-premier-league-ipl\">Indian Premier League (IPL)</a>,&nbsp;<a href=\"https://www.thequint.com/indian-premier-league-ipl/ipl-2024-mayank-yadav-india-latest-pace-prodigy-lsg-selectors-are-already-keeping-an-eye\">Mayank Yadav</a>&nbsp;has stolen the limelight with his pace yet again during&nbsp;<a href=\"https://www.thequint.com/indian-premier-league-ipl/ipl-2024-rcb-vs-lsg-quinton-de-kocks-81-mayank-yadavs-3-fer-powers-lsg-to-a-28-run-win-over-rcb\">Lucknow Super Giants&rsquo; 28-run triumph</a>&nbsp;over Royal Challengers Bengaluru on Tuesday (2 April), at the M Chinnaswamy Stadium.</p>\r\n\r\n<p>The young pacer from Delhi recorded staggering figures of 4-0-14-3, on a ground which historically has been harsh on the bowlers. His victims in this match included Rajat Patidar and two power-hitting Australians &ndash; Glenn Maxwell and Cameron Green.</p>\r\n', '../admin/upload/660c54001da00_ipl.avif', 2, 1, '2024-04-02 18:52:48'),
(42, 'Amit Shah slams Cong after banned PFI\'s political wing SDPI extends support: ‘Can people of Karnataka remain safe?\'', '<p>Union home minister Amit Shah on Tuesday lashed out at the Congress after banned radical outfit Popular Front of India&#39;s political arm Social Democratic Party of India (SDPI) extended support to the grand old party-led United Democratic Front.</p>\r\n\r\n<p>&ldquo;On one hand there are blasts in Bengaluru, on the other hand, I just got the news that SDPI has supported Congress. If this is true then can the people of Karnataka remain safe under the Congress government?&rdquo; Shah said during his address at a roadshow in Karnataka&#39;s Ramanagara.</p>\r\n', '../admin/upload/660c5489e41ad_amit.jpg', 1, 1, '2024-04-02 18:55:05'),
(43, 'Nikkhil Advani says south Indian film industries have more unity than Bollywood: \'We are just busy...\'', '<p>In an interview with Film Companion, the filmmaker praised south Indian film industries, especially Telugu and Tamil ones, calling them more professional and more unified than Bollywood. &quot;The Hindi film industry has no unity. As a kid, I admired what Yash Chopra and Yash Johar used to do. Yash Johar worked as a production manager for Navketan and RK Films. The way Ramesh Sippy and BR Chopra used to work, we don&#39;t have that&quot;, Nikkhil said.</p>\r\n\r\n<p>&quot;However, nowadays we are just busy competing and we don&#39;t celebrate each other. The first thing we need to do is come together and say that &#39;we are one&#39;. Unfortunately, we don&#39;t agree on anything, be it release windows or distribution module. Each for his own. Vinod Chopra will try to be some kind of rebel, first everybody will say &#39;wow&#39; and then say &#39;pagal hai yeh toh (he is crazy)&quot;, the Batla House director added.</p>\r\n', '../admin/upload/660c54d1a3656_nikhil.jpg', 3, 1, '2024-04-02 18:56:17'),
(44, 'Safeguarding National Security Ordinance: The last nail in the coffin of democracy in Hong Kong', '<p>The new security legislation in Hong Kong, known as Article 23 and formally christened Safeguarding National Security Ordinance, has claimed its first victim. Radio Free Asia has closed its Hong Kong bureau because of concerns over the safety of journalists. &ldquo;Actions by Hong Kong authorities, including referring to RFA as a &lsquo;foreign force,&rsquo; raise serious questions about our ability to operate in safety with the enactment of Article 23,&rdquo; RFA President Bay Fang said in a statement on Saturday.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '../admin/upload/660c554907a6d_place.webp', 5, 1, '2024-04-02 18:58:17'),
(45, 'Hollywood prison dramas that will keep you entertained', '<p>What&#39;s the story</p>\r\n\r\n<p><a href=\"https://www.newsbytesapp.com/news/entertainment/hollywood\">Hollywood</a>&#39;s prison dramas have long held audiences&#39; attention, offering a window into the lives of those incarcerated and the intricacies of the justice system.These films often grapple with themes of freedom, redemption, and the resilience of the human spirit.Here are five seminal Hollywood prison dramas that have not only captivated viewers but also left a profound mark on the fabric of cinema.</p>\r\n\r\n<p>Movie 1</p>\r\n\r\n<h2>&#39;The Shawshank Redemption&#39;</h2>\r\n\r\n<p><em>The Shawshank Redemption</em>, directed by Frank Darabont and released in 1994, is based on&nbsp;<a href=\"https://www.newsbytesapp.com/news/world/stephen-king\">Stephen King</a>&#39;s novella.It follows Andy Dufresne, wrongfully convicted of murder, as he forms a friendship with fellow inmate Red and finds ways to live with dignity in harsh conditions.The film is celebrated for its poignant message about hope and perseverance.</p>\r\n\r\n<p>Movie 2</p>\r\n\r\n<h2>&#39;The Green Mile&#39;</h2>\r\n\r\n<p><em>The Green Mile</em>, directed by Frank Darabont in 1999, is a film adaptation of Stephen King&#39;s novel.It unfolds the story of Paul Edgecomb, a death row corrections officer, who meets an extraordinary inmate with supernatural powers.This drama, rich in emotion, probes deeply into moral dilemmas, compassion, and the entangled issues surrounding the death penalty.</p>\r\n', '../admin/upload/660c559914268_hollywood.avif', 16, 1, '2024-04-02 18:59:37'),
(46, 'Making Waves In India And Hollywood', '<p><strong>Rohan Gurbaxani</strong>&nbsp;may be new to Bollywood, but he has already worked with top banners like Farhan Akhtar&#39;s Excel Entertainment, Zoya Akhtar&#39;s Tiger Baby Films and Karan Johar&#39;s Dharma Productions.</p>\r\n\r\n<p>Last seen in&nbsp;<em>Kho Gaye Hum Kahan</em>, the young actor is awaiting the release of&nbsp;<em>Bandish Bandit 2</em>&nbsp;and Anurag Basu&#39;s&nbsp;<em>Metro In Dino</em>.</p>\r\n\r\n<p>Interestingly, Rohan is also making waves in Hollywood, having worked with actors like Alec Baldwin and John Malkovich.</p>\r\n\r\n<p>So who&#39;s he again?</p>\r\n\r\n<p>Rohan introduces himself to&nbsp;<strong>Patcy N/<em><a href=\"http://rediff.com/\" target=\"_blank\">Rediff.com</a></em></strong>&nbsp;and says, &quot;In Bollywood, everyone is on WhatsApp, so I would send messages to 50 people every day -- casting associates, producers, directors... I kept putting my face out there. I knew I had the skill and the work to show. It was just about getting the right people to see the work.&quot;</p>\r\n\r\n<p><strong>Tell us about yourself.</strong></p>\r\n\r\n<p>My family has a real estate business in Bangalore, where I grew up.</p>\r\n\r\n<p>I used to attend Shiamak Davar&#39;s dance classes, and take part in inter-school competitions. I was very passionate about dance.</p>\r\n\r\n<p>Hrithik Roshan was my dancing idol.</p>\r\n\r\n<p>When&nbsp;<em>Dhoom 2</em>&nbsp;came out, I was hooked.</p>\r\n\r\n<p>There was a Jagriti theatre near my house, and the lady running it was my mom&#39;s friend. So I started participating in school plays from Standard 5.</p>\r\n\r\n<p>I think when I was in Standard 8, I had this dream of wanting to act and going to New York.</p>\r\n\r\n<p>When I was in Standard 12, I applied for the Tisch School of the Arts at New York University. I got selected and did a four-year degree course there.</p>\r\n', '../admin/upload/660c55edca22e_rohan.jpg', 16, 1, '2024-04-02 19:01:01'),
(47, 'Hollywood Walk of Fame Nominations for 2025 Now Open', '<p>The Hollywood Chamber of Commerce is accepting nominations for the Hollywood Walk of Fame Class of 2025. The deadline for submissions is May 31. There is a $250 application fee, and applications can be obtained starting April 15 at&nbsp;<a href=\"https://walkoffame.com/\" target=\"_blank\">walkoffame.com</a>. The Walk of Fame Committee will select approximately 24 names for honorees.</p>\r\n\r\n<p>Anyone can submit a nomination, whether on behalf of themselves or another individual or group. The sponsor must submit a photo, bio and the nominee&#39;s qualifications along with a list of contributions to the community and civic-oriented participation.</p>\r\n\r\n<p>A letter of agreement from the nominee or their management must also be included in the application. Potential nominees must sign off on the nomination forms and agree to attend the event to accept the honor if selected.</p>\r\n\r\n<p>Individuals or groups selected for a star have two years in which they can set their ceremony date, after which their selection will expire. Posthumous nominations have a two-year waiting period before they can be nominated.</p>\r\n\r\n<p>The cost of installing a star on the Walk of Fame upon approval is approximately $75,000 and the sponsor of the nominee will accept the responsibility for arranging for payment to the Hollywood Historic Trust. The funds are used to pay for the creation and installation of the star and ceremony, as well as maintenance of the Walk of Fame.</p>\r\n\r\n<p>More than 2,700 honorees are currently enshrined on the walk. Recent honorees include&nbsp;<a href=\"https://www.youtube.com/watch?v=QzyezumEPtQ\" target=\"_blank\">Martha Reeves</a>,&nbsp;<a href=\"https://variety.com/2024/music/news/dr-dre-hollywood-walk-of-fame-star-1235945423/\" target=\"_blank\">Dr. Dre</a>,&nbsp;<a href=\"https://www.youtube.com/watch?v=MlWq8BcnwhE\" target=\"_blank\">Lenny Kravitz</a>&nbsp;and&nbsp;<a href=\"https://variety.com/2024/tv/focus/eugene-levy-american-pie-schitts-creek-dan-levy-catherine-o-hara-1235929542/\" target=\"_blank\">Eugene Levy</a>. New selections will be announced in June or July.</p>\r\n', '../admin/upload/660c564d217ea_walk.jpg', 16, 1, '2024-04-02 19:02:37'),
(48, 'T20 World Cup 2024: Ben Stokes Opts Out Of Selection Contention To Focus On Fulfilling All-Rounder\'s Role Fully', '<p>England all-rounder Ben Stokes has confirmed he will not take part in the selection of the T20 World Cup 2024, set to begin on 2nd June in the West Indies and USA. As per England Cricket Board (ECB)&#39;s official release, Stokes revealed that he wants to focus on becoming a bona fide all-rounder again.</p>\r\n\r\n<p>Stokes did not bowl for the large part of the Test series in India after undergoing knee surgery and rehab following that. The 32-year-old bowled only in the final Test and showed promising signs for the summer. The Test skipper also declared his availability for Durham in the County Championship.</p>\r\n\r\n<p>Speaking on the decision, Stokes revealed that the Test tour of India made him understand how far behind he is when it comes to his bowling. The star cricketer wished Jos Buttler&#39;s men good luck for their title defence.</p>\r\n\r\n<p>&quot;I&rsquo;m working hard and focusing on building my bowling fitness back up to fulfil a full role as an all-rounder in all formats of cricket. Opting out of the IPL and the World Cup will hopefully be a sacrifice that allows me to be the all-rounder I want to be for the foreseeable future.&quot;</p>\r\n\r\n<p>&quot;The recent Test tour of India highlighted how far behind I was from a bowling point of view after my knee surgery and nine months without bowling. I&rsquo;m looking forward to playing for Durham in the County Championship before the start of our Test summer. I wish Jos, Motty and all the team the best of luck in defending our title.&quot;</p>\r\n', '../admin/upload/660c5697930d5_stokes.jpg', 2, 1, '2024-04-02 19:03:51'),
(49, 'IPL 2024: MS Dhoni or Sameer Rizvi, who should be CSK\'s finisher? Sidhu makes his pick', '<p>Former India cricketer turned commentator Navjot Singh Sidhu understood that CSK need to give opportunities to Sameer Rizvi and back him as the finisher for the franchise. MS Dhoni turned back the clock with his blazing knock of 37 runs from 16 deliveries against Delhi on March 30, Sunday. However, touted as one of the best finishers, the former CSK captain couldn&#39;t guide his team to a win as CSK suffered their first loss of IPL 2024 against DC by 20 runs.</p>\r\n\r\n<p>Answering to a question by Indiatoday.in on Star Sports Press Show, Sidhu said that a talent is nothing without opportunity. He felt the team needed to give that confidence to Rizvi, on whom the franchise shelled out a Rs 8.40 crore in the IPL 2024 auction.</p>\r\n', '../admin/upload/660c5e0b5a25c_dhoni.jpg', 2, 1, '2024-04-02 19:04:51'),
(50, 'Storm, lightning kill four in Assam', '<p>y during a storm in Guwahati on March 31, 2024. | Photo Credit: AFP</p>\r\n\r\n<p><strong>GUWAHATI</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Four people died after a storm accompanied by heavy rainfall struck parts of Assam on Monday.</p>\r\n\r\n<p>A statement issued by the Assam State Disaster Management Authority said lightning killed one person each in the West Karbi Anglong and Udalguri districts, while a 30-year-old woman died due to a storm in the Cachar district.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A four-year-old boy died after a boat capsised in South Salmara district. The incidents happened between 3 p.m. and 11 p.m.</p>\r\n\r\n<p>Expressing grief over the deaths, Assam Chief Minister Himanta Biswa Sarma said the Centre has assured assistance for relief and rehabilitation of the affected people.</p>\r\n', '../admin/upload/660c5746c3ce2_lightning.jpg', 5, 7, '2024-04-02 19:06:46'),
(51, 'Assam: Child dies, two missing as boat capsizes in Brahmaputra amid heavy rain, storm', '<p>UWAHATI: A four-year-old child died and two persons were reported missing after a boat capsized in the Brahmaputra in South Salmara-Mankachar district, amid heavy rain and hailstorm across Assam, a senior official said on Monday.</p>\r\n\r\n<p>Union Home Minister Amit Shah dialled Chief Minister Himanta Biswa Sarma to enquire about the situation in the state, and assured of all assistance, he said.</p>\r\n\r\n<p>The sudden storm accompanied with hail and a downpour lashed several parts of the state since Sunday evening, uprooting trees, electric poles and damaging houses, Assam State Disaster Management Authority (ASDMA) CEO Gyanendra Dev Tripathi said.</p>\r\n\r\n<p>&quot;A country boat sank at 5 pm yesterday at Nepurer Alga village while travelling from Sishumara ghat to Nepurer Alga ghat. A child&#39;s body was recovered by locals and two people are missing,&quot; he told PTI.</p>\r\n', '../admin/upload/660c5791043a2_flood.jpg', 5, 7, '2024-04-02 19:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'politics'),
(2, 'sports'),
(3, 'bollywood'),
(5, 'national'),
(16, 'hollywood');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'dhriti', 'dhriti@123', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(7, 'aftab', 'aftab@gmail.com', '709e80ad0034a4f0a68f2da1554739de2e483e3a', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
