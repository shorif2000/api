

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]


# Basic API using Laravel 8.x

<!-- ABOUT THE PROJECT -->
## About The Project

- This exposes a user model. A user has (at least) the following attributes:
  - id - a unique user id
  - email - a user's email address
  - givenName - in the UK this is the user's first name
  - familyName - in the UK this is the user's last name
  - created - the date and time the user was added
- Have the ability to persist user information for at least the lifetime of the test.
- Expose functionality to create, read, update and delete (CRUD) users. 
- Easily consumable by a plain HTTP client (e.g. cURL or Postman) or, if using a transport other than HTTP, be trivial to write a client application to consume it.

### Built With

* Laravel

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

* PhP 7
* Composer
* Mysql

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/shorif2000/api
   ```
3. Install packages
   ```sh
   composer update
   ```
4. Update `env` file with your mysql settings
   ```shell
   cp .env.example .env
   ```
   
5. Run migrations
    ```shell
    php artisan migrate   
    ```
6. Load some data
    ```shell
    php artisan db:seed
    ```
7. Run service locally 
    ```shell
    php artisan serve
    ```

<!-- USAGE EXAMPLES -->
## Usage

#### Register

```shell
curl -X POST http://localhost:8000/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"givenName": "Sharif", "familyName":"Uddin","email": "sharif.uddin@gmail.com", "password": "123", "password_confirmation": "123"}'
```

#### Login

```shell
curl -X POST http://localhiiiiost:8000/api/login \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"email": "sharif.uddin@gmail.com", "password": "123"}'
```

Response

```shell
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYWQ5YjU4MTU1NDgwNTZhM2E5MDZmYjU1OWRlNTdhMTZjZDhmYmVjMWJjYjFlNWEwNDllN2E0YzgyMGUwN2I4NDFmYmQxNDZhNjdjYjEzYTAiLCJpYXQiOiIxNjE1MTQ2NDEyLjA3NTU5NCIsIm5iZiI6IjE2MTUxNDY0MTIuMDc1NTk4IiwiZXhwIjoiMTYzMTA0NDAxMS45MTc0NjkiLCJzdWIiOiIxMSIsInNjb3BlcyI6W119.vNjyS95PqhpTHVd-nmRMcbw7kGnk-3PMIKTWwi9f0kFSeZhBGmZmc6JAtbIa8rpRu3P-26ZpbIzvUq1XVbI3DFu3qr2zvO2VamOJiHSzaCTP8ZChGK_j7mdCO6--NFt-aADc4GqywW_-N2Ztk_btSxs-PtqyLEPxYjxY9xoXlQcFYYH4S_9BMy4PfyVYxnezbcZNyBdHqoRPgpcEQgr2jFYqgcklZejng7uutSRiIj4EDLRwUu9AZfrFNa5vYbEgguX9ZonWJuFnxFJ8BQaoB1bEkCIUhhCheQvzo0U48kR2dQfTZ1zRN2wgb4gT3zvDrOWnzARObEWJBJ5UyEcNMyAxb3QME67lheT1faLM6CFO4S59iHksH7Dhon2LZ-rmiHzcVxc9Dxmwvk-6QCbyTSNcr2hbqu580vcbwOJOZo6YR_E3GE-9h0L7vWHsSG9BKsO9XnIaRlwQHcPG21wht88Uzw28PPLkzMs6mDsqAQ0ji8Ef1r95xTKLyhiY0dRRXdqqoh0Vp8n4ybictDSH5-7TuRM4NhKMmxcOp_wVAUWPHFiYOZY0RfIbZvfhNEPVHz_Ou1U1QPXF8RupfTRB4R8vOaJjzGBl05EFjLXvgyP1N5ybTJeSPbVLgZK2qWiwiZeuHjk3r66GruRNhwR35guE29m14TzK2_fgpP4gf4w",
    "token_type": "Bearer"
}
```

This should return bearer token to use on all other requests

#### get all users

```shell
curl --location --request GET 'http://localhost:8000/api/users' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYWQ5YjU4MTU1NDgwNTZhM2E5MDZmYjU1OWRlNTdhMTZjZDhmYmVjMWJjYjFlNWEwNDllN2E0YzgyMGUwN2I4NDFmYmQxNDZhNjdjYjEzYTAiLCJpYXQiOiIxNjE1MTQ2NDEyLjA3NTU5NCIsIm5iZiI6IjE2MTUxNDY0MTIuMDc1NTk4IiwiZXhwIjoiMTYzMTA0NDAxMS45MTc0NjkiLCJzdWIiOiIxMSIsInNjb3BlcyI6W119.vNjyS95PqhpTHVd-nmRMcbw7kGnk-3PMIKTWwi9f0kFSeZhBGmZmc6JAtbIa8rpRu3P-26ZpbIzvUq1XVbI3DFu3qr2zvO2VamOJiHSzaCTP8ZChGK_j7mdCO6--NFt-aADc4GqywW_-N2Ztk_btSxs-PtqyLEPxYjxY9xoXlQcFYYH4S_9BMy4PfyVYxnezbcZNyBdHqoRPgpcEQgr2jFYqgcklZejng7uutSRiIj4EDLRwUu9AZfrFNa5vYbEgguX9ZonWJuFnxFJ8BQaoB1bEkCIUhhCheQvzo0U48kR2dQfTZ1zRN2wgb4gT3zvDrOWnzARObEWJBJ5UyEcNMyAxb3QME67lheT1faLM6CFO4S59iHksH7Dhon2LZ-rmiHzcVxc9Dxmwvk-6QCbyTSNcr2hbqu580vcbwOJOZo6YR_E3GE-9h0L7vWHsSG9BKsO9XnIaRlwQHcPG21wht88Uzw28PPLkzMs6mDsqAQ0ji8Ef1r95xTKLyhiY0dRRXdqqoh0Vp8n4ybictDSH5-7TuRM4NhKMmxcOp_wVAUWPHFiYOZY0RfIbZvfhNEPVHz_Ou1U1QPXF8RupfTRB4R8vOaJjzGBl05EFjLXvgyP1N5ybTJeSPbVLgZK2qWiwiZeuHjk3r66GruRNhwR35guE29m14TzK2_fgpP4gf4w' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6Imc5UFh3d1l5L2lQVC9PT2REUmEwdFE9PSIsInZhbHVlIjoiU0sySlBCNENOMHFrWnVOUm1aOGVKSkFrc3pEd2VwcTNuV1o3V3hhM1B2M2hHbGtmeVcxV01nZnBGMnZlZ0hUMUdQU3VxbWhIdFpqZzVZN1ovR2FkNktOV0NkbTNWSzNoUFJqTlN2MEZ1K1hrUHVhaEdzRHAzbFRaQjE5Q3UyUFciLCJtYWMiOiJlNmJmZDE3MTg1NGU3MWRhOGZhZDdkZDUwYTA1NGUyZWJjNWQ1ZGUwN2FkZjhiMWE4MThlYzk5MjZjNzQ5YjQ2In0%3D; laravel_session=eyJpdiI6Inh5cS8wdUl6WTQ3SG43cHMvS085REE9PSIsInZhbHVlIjoiOWNleExFZHB0N2dwanVOT3hFMzhnZHFGaEp1WWZYdDV2dnZRMlhBdEpYcVd1NW1qcW4vMEtER0FUMTFEbk1DTWlWaUxjaklEVHJLZzZvMGh0NGNTOHp4QmhYdGpTdTB5cndXdXBkK1JCWUNuRXFXNjZlcXdTUStCSU54ZzJxRmgiLCJtYWMiOiI4ZWM2YTgzMWFiNTQyZDQ0ODZhZGM1NTNhMTAzMzFiYzU4ZTQzNzA2Yzc3NWIwZjRmZTc1NjIwOWVhZDQxNTMyIn0%3D'
```


Should return array of users.

#### 

<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/othneildrew/Best-README-Template/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Your Name - [@your_twitter](https://twitter.com/your_username) - email@github.com/shorif2000/api

Project Link: [https://github.com/your_username/repo_name](https://github.com/your_username/repo_name)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
* [Img Shields](https://shields.io)
* [Choose an Open Source License](https://choosealicense.com)
* [GitHub Pages](https://pages.github.com)
* [Animate.css](https://daneden.github.io/animate.css)
* [Loaders.css](https://connoratherton.com/loaders)
* [Slick Carousel](https://kenwheeler.github.io/slick)
* [Smooth Scroll](https://github.com/cferdinandi/smooth-scroll)
* [Sticky Kit](http://leafo.net/sticky-kit)
* [JVectorMap](http://jvectormap.com)
* [Font Awesome](https://fontawesome.com)





<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png
