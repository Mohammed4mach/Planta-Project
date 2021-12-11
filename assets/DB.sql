CREATE DATABASE plantadb;
USE plantadb;

/* Creating users table */
CREATE TABLE users
	(
		user_id INT(9) UNSIGNED NOT NULL PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
		password VARCHAR(255) NOT NULL,
        gender CHAR NOT NULL,
        birth_date TIMESTAMP NOT NULL,
        img_path VARCHAR(255) UNIQUE,
        create_date TIMESTAMP DEFAULT '2014-08-14 06:30:00' NOT NULL,
        admin BIT
    );

/* Creating plants table */
CREATE TABLE plants
	(
		id INT(9) UNSIGNED NOT NULL PRIMARY KEY,
        plant_name VARCHAR(255) NOT NULL,
        info TEXT(2000),
        img_path VARCHAR(255)
    );

/* Creating articles table */
CREATE TABLE articles
    (
        article_id INT(9) UNSIGNED NOT NULL PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT(30000) NOT NULL,
        id INT(9) NOT NULL,
        create_date TIMESTAMP DEFAULT '2014-08-14 06:30:00' NOT NULL,
        img_path VARCHAR(255),
        FOREIGN KEY(id) REFERENCES plants(plant_id) ON DELETE CASCADE ON UPDATE CASCADE
    );

/* Creating interests table */
CREATE TABLE interests
    (
        user_id INT(9) UNSIGNED NOT NULL,
        plant_id INT(9) UNSIGNED NOT NULL,
        FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT pk_interests PRIMARY KEY (user_id, plant_id)
    );

/* Creating likes table */
CREATE TABLE likes
    (
        user_id INT(9) UNSIGNED NOT NULL,
        article_id INT(9) UNSIGNED NOT NULL,
        FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT pk_likes PRIMARY KEY (user_id, article_id)
    );

/* Creating comments table */
CREATE TABLE comments
    (
        user_id INT(9) UNSIGNED NOT NULL,
        article_id INT(9) UNSIGNED NOT NULL,
        content TEXT(10000),
        FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT pk_comments PRIMARY KEY (user_id, article_id)
    )

/* Insert admin users */
INSERT INTO users (user_id, username, email, password, gender, birth_date, img_path, exist_date, admin)
            VALUES
                (
                    1,
                    "Admin",
                    "hmoomh15@gmail.com",
                    "admin123",
                    "M",
                    TO_TIMESTAMP('2000-04-13 11:00:00.000000000', 'YYYY-MM-DD HH24:MI:SS.FF'),
                    "../uploads/users-img/admin.png",
                    TO_TIMESTAMP('2021-12-10 07:00:00.000000000', 'YYYY-MM-DD HH24:MI:SS.FF'),
                    1
                );

/* Insert plants data */
INSERT INTO plants (plant_id, plant_name, info)
            VALUES
                (
                    86996405306,
                    "Hibiscus",
                    "To take care of it \nIt focuses on organic fertilization at least twice a year, aligns between successive blooming periods that are usually more frequent in the spring and early summer, recommends increasing humidity in the summer and decreasing in the winter, succeeds in most land types, and tolerates different climatic conditions better than other species."
                ),
                (
                    17318428695,
                    "Dypsis lutescens",
                    "You need very bright lighting without direct sun\nThe room temperature is the right degree , about 18 to 27 degrees\nNot irrigated until the top of the soil has dried, and continuous moisture in the water can cause the roots to rot. Prefer to spray the leaves regularly; the tub should be changed to a larger tub when the tub is full of roots every two to three years."
                ),
                (
                    22357893754,
                    "Sansevieria",
                    "Any kind of thin, well-drained soil works, keeping away from clay soil that is poorly drained because it damages roots so badly. It is recommended that half of the soil be coarse sand or small gravel to ensure good drainage of excess water and ventilation of the roots.\nIt is a plant of juice and its relatives pencil cactus, which means they tolerate the thirst for long periods, since the plant stores water in the leaves. Irrigation is usually not irrigated until the soil is completely dry in summer or winter, with irrigation spacing times in cold weather. It is a plant that loves high atmospheric humidity around it, so during hot weather we consider splashes of water during high temperatures. Also, it is desirable to clean the leaves of dust regularly to maintain their appearance and luster."
                ),
                (
                    79003836072,
                    "Mandevilla",
                    "A ceramic or earthenware vessel is used with enough holes on the bottom for proper drainage; when the plant grows to a certain height, it is transported to larger vessels or containers because it must have enough space to spread the roots. mandevelas are not acidic plants but can thrive in soils that are neuro-acidic or slight alkaline nearly, giving a good, fertile soil with ph ranging from 6.6 to 7.5.\nThe plant should be watered regularly when the soil is dry, when the roots are fully seated, the water supply of the plants can be increased, and excessive irrigation should be avoided as it can cause the roots to rot\nThe plant should be placed where it gets bright indirect sunlight when grown indoors, when it is mature the plant can be placed in sunlight for at least 8 hours a day."
                ),
                (
                    78468629183,
                    "Bougainvillea",
                    "Fertilizer given four times a year, irrigated with water twice a day during extreme heat, once during mild weather (autumn and spring) and once in winter every two days watered once, penned as desired and for the planting purpose."
                ),
                (
                    53147688195,
                    "Pansies",
                    "It is preferable to plant pansies in moist soil that contains a lot of compost. It will grow in either full sun or partial shade, but in hot climates. Pansies begin to bloom about 12 to 14 weeks after planting.\nIf you want to grow seeds on your own, it's easy. Prepare the seeds 8 to 12 weeks before planting.\nPansies can tolerate low temperatures. But it is subject to damage at low temperatures during cultivation. Therefore, the pansies must be planted during the end of summer and the beginning of autumn in a warm climate."
                ),
                (
                    35488356281,
                    "Mint Plant",
                    "To take care of mint plants, you must first choose a good plant for planting, then choose the correct time for planting mint and choose the appropriate container for planting it, as it is preferable to start planting it either in spring or autumn.\n\nOne of the most important steps to take care of mint plants is to put materials or add materials that help the soil to conserve water and prevent its drying out\nPut the mint plant in a good place and there is enough sun and choose a suitable type of soil that is not salty for mint\nMint should be irrigated with water that contains the necessary elements such as iron, phosphorous, etc., and does not contain many salts.\nYou should continue to prune the top of the mint periodically.\nTreat the plant if it is infected with fungal rust.\nUse a bio-cover to protect mint roots before the frost season",
                ),
                (
                    28412751115,
                    "Jasmine Plant",
                    "It needs moderate heat in summer, while avoiding the scorching noon sun. It is preferable to put it in some shade, especially in the case of home cultivation.\nIn winter, the plant goes into dormancy, so it needs to provide some warmth and spacing between watering times depending on the weather and temperatures.\nThe plant is successful in its cultivation in all types of soil, provided that the drainage is good, as the plant is highly sensitive to root rot.\nIt is preferable to fertilize it with organic fertilizer at the beginning of the winter, if it is planted in the ground or the garden. But in cases of home cultivation or on balconies, it is preferable to rely on a balanced compound fertilizer during the growth period from the beginning of spring until the end of the summer once a month"
                ),
                (
                    65000775615,
                    "White Jasmine Plant",
                    "Soil: It should be light, sandy, well-drained and rich in organic matter.\nDirect sunlight: direct and harmless sunlight is preferred, not less than 6 hours per day and not less than 3 hours.\nExcessive irrigation: harms it, as it bears drought a little more than the soil overflowing with water, so the soil moisture must be maintained without any increase in order to bloom well.\nBalanced fertilizer: It can be added in the spring to maintain soil fertility."
                ),
                (
                    29942882516,
                    "Fragrant Plant",
                    "Basically an outdoor plant, but it can be raised internally, provided that it is exposed to direct sunlight at the beginning of the day in summer or in the middle of the day in winter for an estimated period of four hours. Moderation in irrigation from spring to autumn and reduced in winter, and the plant is given fertilizer during the same irrigation period at regular intervals once a month. Spring, because its fragile stems may break with increasing length."
                ),
                (
                    34955899862,
                    "Peace Lily Plant",
                    "The plant prefers shaded places, and needs little sunlight to grow, and can be watered once a week, preferably keeping the soil moist, and does not need watering unless it dries up.\nYou need to provide a suitable place with light to medium light, as they grow and thrive in warm weather, and they are generally plants that like high humidity"
                ),
                (
                    65113149904,
                    "Lantana",
                    "The scientific name of the plant ... Lantana camara\nLantana is a genus of plants in the verbenaceas family, in the order Labiaceae. It consists of about 160 species of biennial angiosperm. It is found in different regions of the world, especially in the tropical regions of America, Africa and Pacific countries such as Australia.\nA fast-growing evergreen shrub... planted singly or as a flowering hedge... Able to cut and shape... Leaves oval, dark green, rough to the touch, serrated edges...\nThe shrub bears flowers most of the year, and the flowers are small and multicolored >> They gather in beautiful inflorescences, some of which are yellow and some of them are colored yellow with orange...\nThe fruit is spherical in shape, small..\nThis plant is characterized by the fact that its leaves have a distinctive aromatic smell and are characterized by a long flowering period, and it is preferable to enjoy the view of the flowers and keep them without cutting until the seeds are formed, then he cuts the fence."
                ),
                (
                    23704960027,
                    "Lemon Cypress",
                    "It is one of the trees that are used to decorate homes, and there is more than one type of cypress, but the most famous is the lemon cypress tree.\nIt is said that the Greeks used the tree 2000 years ago to treat asthma and cough and calm spasms and lung infections.\nplant care:\nChoosing the right place to plant them in outdoor gardens or as indoor plants.\nIt requires well-drained soil such as sandy or chalky, and it can grow in acidic, alkaline or medium soils and cannot live in the shade\nIt needs about 6:8 hours of direct sunlight"
                ),
                (
                    47063319416,
                    "Kalanchoe Plant",
                    "It is a genus of plants belonging to the clary family, in the order of faecalis, and includes about 125 species.\nThese plants are characterized by their beautiful flowers and are used as an ornamental plant, and the "diamond" is considered one of the most important types of economic importance.\n- Blooming and its flowers are long-lived and take colors for a period of (red, yellow, purple, orange).\nThe ambient temperature should not be less than degrees during the flowering period and appear throughout the year and reach a height of 30 cm."
                ),
                (
                    31864628641,
                    "Coleus",
                    "Coleus carpet plant is an artistic painting of natural colors.. It is one of the most common plants Beauty, fame, and knowledge for everyone.It is one of the most easy plants to grow and multiply.. perennial herbaceous plants Very fast growing. It needs more care in the winter by providing a warm atmosphere around it to make it last for years, otherwise it may Wither and die.. Carpet plant leaves vary in size, shape and color.. Carpet plants bloom small blue flowers in summer. The carpet plant is distinguished by its wonderful and mixed colors.. the leaf in some species consists of one or two colors and some Leaf species have more than three colors.. The colors consist of a mixture of green, yellow, red and pink. It is preferable to fertilize the carpet plant with NPK neutral fertilizer once a month during spring and summer to encourage the plant to grow Better.. It is also preferable to prune and cut the new growing branches to encourage the plant to increase the vegetative total.. It is preferable that the length of the branches does not reach more than 15 cm. This is better to give the plant a denser and more beautiful view."
                ),
                (
                    98639142467,
                    "Orchid Phalaenopsis",
                    "Orchid, butterfly orchid, indoor plant is a flowering shrub in several colors and gradient and very attractive, native to Southeast Asia, India, the Philippines and North Australia, and its genus includes a large number of species.\nIt may reach 22,000 species, its flowers combined in the form of spikes, their number ranges from 6 to 15 flowers and may increase, and from its colors are white and shades of pink, violet and yellow. Its leaves are flat, thick, dark green, surrounding the flower stand.\nIt has been produced by modern means types that are easy to take care of at home."
                ),
                (
                    59949824770,
                    "Spathiphyllum Wallisii",
                    "The white sail plant or the peace lily is considered a shrub of the taro family and is considered one of the air-purifying plants. It has names in Arabic, including: white sails, peace lily, and white flag. It is an evergreen perennial, its trunks arise directly from the soil, its leaves are dark green, and large, ranging from 20 cm in length and 7 cm in width, with small white veins carried on a slender stalk, and embraced by a distinctive middle leaf from which emerge feathery branching veins, producing pure white flowers called qanabah, which is the reason for the Arabic name.\n White sails need light to medium, thrive in warm weather, tolerate temperature drops to 12 degrees Celsius, and love high humidity, so it is recommended to use wet gravel tray to be under it constantly, especially in summer, as well as preferably during the summer to continue and repeat spraying with spray on green leaves avoid spraying white papers and flower; To not be exposed to mold."
                ),
                (
                    49203846256,
                    "Dieffenbachia",
                    "Dieffenbachia is a genus of tropical flowering plants in the family Araceae. It is native to the New World Tropics from Mexico and the West Indies south to Argentina. Some species are widely cultivated as ornamental plants, especially as houseplants, and have become naturalized on a few tropical islands.\nDieffenbachia is a perennial herbaceous plant with straight stem, simple and alternate leaves containing white spots and flecks, making it attractive as indoor foliage. Species in this genus are popular as houseplants because of their tolerance of shade. Its English names, dumb cane and mother-in-law's tongue (also used for Sansevieria species) refer to the poisoning effect of raphides, which can cause temporary inability to speak.[5] Dieffenbachia was named by Heinrich Wilhelm Schott, director of the Botanical Gardens in Vienna, to honor his head gardener Joseph Dieffenbach (1796-1863)."
                ),
                (
                    44728042120,
                    "Monstera Deliciosa",
                    "Monstera is a genus of 45 species of flowering plants in the arum family, Araceae, native to tropical regions of the Americas. The genus is named from the Latin word for `monstrous` or `abnormal`, and refers to the unusual leaves with natural holes that members of the genus have.\nThey are herbs or evergreen vines, growing to heights of 20 metres (66 ft) in trees, climbing by means of aerial roots which act as hooks over branches; these roots will also grow into the soil to help support the plant. Since the plant roots both into the soil and over trees, it is considered a hemiepiphyte. The leaves are alternate, leathery, dark green, very large, from 25-90 centimetres (9.8-35.4 in) long (up to 130 centimetres (51 in) long in M. dubia) and 15-75 centimetres (5.9-29.5 in) broad, often with holes in the leaf blade. The fenestrated leaves allow for the leaves to spread over greater area to increase sunlight exposure, by using less energy to produce and maintain the leaves. The flowers are borne on a specialised inflorescence called a spadix, 5-45 centimetres (2.0-17.7 in) long; the fruit is a cluster of white berries, edible in some species."
                ),
                (
                    46357709861,
                    "Gardenia Jasminoides",
                    "Gardenia is a genus of flowering plants in the coffee family, Rubiaceae, native to the tropical and subtropical regions of Africa, Asia, Madagascar and Pacific Islands, and Australia. The genus was named by Carl Linnaeus and John Ellis after Dr. Alexander Garden (1730-1791), a Scottish-born American naturalist.\nGardenias are evergreen shrubs and small trees growing to 1-15 metres (3.3-49.2 ft) tall. The leaves are opposite or in whorls of three or four, 5-50 centimetres (2.0-19.7 in) long and 3-25 centimetres (1.2-9.8 in) broad, dark green and glossy with a leathery texture.\nThe flowers are solitary or in small clusters, white, or pale yellow, with a tubular-based corolla (botany) with 5-12 lobes (petals) from 5 to 12 centimetres (2.0 to 4.7 in) diameter. Flowering is from about mid-spring to mid-summer, and many species are strongly scented."
                ),
                (
                    42878901045,
                    "Sansevieria Trifasciata",
                    "Dracaena trifasciata is a species of flowering plant in the family Asparagaceae, native to tropical West Africa from Nigeria east to the Congo. It is most commonly known as the snake plant, Saint George's sword, mother-in-law's tongue, and viper's bowstring hemp, among other names. Until 2017, it was known under the synonym Sansevieria trifasciata. It is an evergreen perennial plant forming dense stands, spreading by way of its creeping rhizome, which is sometimes above ground, sometimes underground. Its stiff leaves grow vertically from a basal rosette. Mature leaves are dark green with light gray-green cross-banding and usually range from 70-90 centimetres (2.3-3.0 ft) long and 5-6 centimetres (2.0-2.4 in) wide, though it can reach heights above 2 m (6 ft) in optimal conditions"
                ),
                (
                    84720704234,
                    "Cereus Repandus",
                    "Cereus repandus (syn. Cereus peruvianus), the Peruvian apple cactus, is a large, erect, thorny columnar cactus found in South America. It is also known as giant club cactus, hedge cactus, cadushi (in Papiamento and Wayuunaiki), and kayush.\n Cereus repandus is grown mostly as an ornamental plant, but has some local culinary importance. The Wayuu from the La Guajira Peninsula of Colombia and Venezuela also use the inner cane-like wood of the plant in wattle and daub construction.\n\nWith an often tree-like appearance, its cylindrical gray-green to blue stems can reach 10 metres (33 feet) in height and 10-20 cm in diameter as a self-supporting plant. However, if supported by a scaffold, C. repandus has grown to a height of 110 feet (34 meters) at the SDM College of Dental Sciences at Dharwad, Karnataka, India, technically making this the tallest cactus plant in the world, although no cactus under natural conditions exceeds eighty-two feet (25 meters) in height in the case of Cereus stenogonus. There are nine to ten rounded ribs that are up to 1 centimeter high. The small areoles on it are far apart. The gray, needle-like thorns are very variable. They are often numerous, but can also be missing entirely. The longest thorns are up to 5 centimeters long."
                ),
                (
                    97591312641,
                    "Lavender",
                    "Lavandula (common name lavender) is a genus of 47 known species of flowering plants in the mint family, Lamiaceae. It is native to the Old World and is found in Cape Verde and the Canary Islands, and from Europe across to northern and eastern Africa, the Mediterranean, southwest Asia to India.\nMany members of the genus are cultivated extensively in temperate climates as ornamental plants for garden and landscape use, for use as culinary herbs, and also commercially for the extraction of essential oils. The most widely cultivated species, Lavandula angustifolia, is often referred to as lavender, and there is a color named for the shade of the flowers of this species. Lavender has been used over centuries in traditional medicine and cosmetics, and `limited clinical trials support therapeutic use of lavender for pain, hot flushes, and postnatal perineal discomfort.`"
                ),
                (
                    64081758749,
                    "Codiaeum",
                    "Codiaeum is a genus of plants under the family Euphorbiaceae first described as a genus in 1824. It is native to insular Southeast Asia, northern Australia and Papuasia."
                ),
                (
                    14922410577,
                    "African Violets",
                    "African violets (or Saintpaulia) are a genus of plants within the Gesneriad family.  Discovered in 1892 by Baron von St Paul (hence the botanical name), many species can still be found growing in the Eastern Arc Mountains of Tanzania and Kenya.  Though their geography is tropical, most species reside in the mountains, at altitude, and under the cover of other plants.  This makes African violets ideal for the indoor home garden or window-requiring only moderate (“room”) temperatures and light.  Though many of the native Saintpaulia are now threatened by loss of habitat, millions of their modern descendants are grown throughout the world in homes of collectors and hobbyists.  As you'll see by viewing our site and catalog, modern African violet hybrids can be spectacular and very different from the simple species first discovered more than a century ago.  Much information about their care and environment can be found throughout these pages."
                ),
                (
                    59757548805,
                    "Aloe Vera",
                    "Aloe vera is a succulent plant species of the genus Aloe. Having some 500 species, Aloe is widely distributed, and is considered an invasive species in many world regions.\nAn evergreen perennial, it originates from the Arabian Peninsula, but grows wild in tropical, semi-tropical, and arid climates around the world.[3] It is cultivated for commercial products, mainly as a topical treatment used over centuries.[3][4] The species is attractive for decorative purposes, and succeeds indoors as a potted plant.\nIt is used in many consumer products, including beverages, skin lotion, cosmetics, ointments or in the form of gel for minor burns and sunburns. There is little clinical evidence for the effectiveness or safety of Aloe vera extract as a cosmetic or topical drug. The name derives from Latin as aloe and vera (`true`)."
                ),
                (
                    57059043853,
                    "Bamboo",
                    "Bamboos are a diverse group of evergreen perennial flowering plants in the subfamily Bambusoideae of the grass family Poaceae. Giant bamboos are the largest members of the grass family. The origin of the word `bamboo` is uncertain, but it probably comes from the Dutch or Portuguese language, which originally borrowed it from Malay or Kannada.\nIn bamboo, as in other grasses, the internodal regions of the stem are usually hollow and the vascular bundles in the cross-section are scattered throughout the stem instead of in a cylindrical arrangement. The dicotyledonous woody xylem is also absent. The absence of secondary growth wood causes the stems of monocots, including the palms and large bamboos, to be columnar rather than tapering.\nBamboos include some of the fastest-growing plants in the world, due to a unique rhizome-dependent system. Certain species of bamboo can grow 910 mm (36 in) within a 24-hour period, at a rate of almost 40 mm (1+1/2 in) an hour (equivalent to 1 mm every 90 seconds). This rapid growth and tolerance for marginal land, make bamboo a good candidate for afforestation, carbon sequestration and climate change mitigation.\nBamboos are of notable economic and cultural significance in South Asia, Southeast Asia, and East Asia, being used for building materials, as a food source, and as a versatile raw product. Bamboo, like wood, is a natural composite material with a high strength-to-weight ratio useful for structures. Bamboo's strength-to-weight ratio is similar to timber, and its strength is generally similar to a strong softwood or hardwood timber."
                )
