function Header() {
  return (
    <div>
      <header>
        <div className="title">
          <h1>E-commerce</h1>
          <img src="./imgs/5837040.png" alt="Logo" />
        </div>

        <input type="search" placeholder="Pesquisar" />

        <nav>
          <ul className="navbar">
            <li>
              <div className="quant"></div>
              <button>
                <i className="bi bi-cart-plus"></i>
              </button>
            </li>
            <li>
              <a href=""><i className="bi bi-house"></i></a>
            </li>
            <li>
                <a href="../backend/controllers/contact.html">Contact</a>
            </li>
            <li>
              <button className="profile">
                <i className="bi bi-person-circle"></i>
              </button>
            </li>
          </ul>
        </nav>
      </header>
    </div>
  );
}

const header = ReactDOM.createRoot(document.getElementById("header"));
header.render(<Header />);


function App() {

    const { useState, useEffect } = React;
    const [produtos, setProdutos] = useState([]);

    useEffect(() => {
    fetch('https://ecommercesimulation.42web.io/backend/services/produtos.php')
        .then(res => {
            console.log("STATUS:", res.status);
            return res.json();
        })
        .then(data => {
            console.log("API DATA:", data);
            setProdutos(data);
        })
        .catch(err => console.error('Erro ao buscar produtos:', err));
}, []);

    return (
        <div>
            <div className="carrossel-section">
                <div className="carrossel-box">
                    <div className="carrossel-slide">

                        <div className="noticia">
                            <img src="./imgs/Cópia de Lemon_20251029_190841_0000.png" alt="" />
                            <div className="text">
                                <p>Todo o setor de técnologia com até</p>
                                <h2><span className="cor-diferente">30% OFF</span></h2>
                            </div>
                        </div>

                        <div className="noticia">
                            <img src="./imgs/Cópia de Lemon_20251029_190841_0000.png" alt="" />
                            <div className="text">
                                <h2>Quer fazer uma <span className="cor-diferente">renda extra</span>?</h2>
                                <ul>
                                    <li>Cadastre-se como vendedor</li>
                                    <li>Resgistre seu produto</li>
                                </ul>
                                <h3><span className="cor-diferente">Pronto</span></h3>
                            </div>
                        </div>

                        <div className="slide-img">
                            <img src="./imgs/3_20251017_210822_0002.png" alt="" />
                        </div>

                        <div className="slide-img">
                            <img src="./imgs/Cópia de Apresentação Básica Minimalista Preto e Branco_20251029_191124_0000.png" alt="" />
                        </div>

                    </div>
                </div>
            </div>

            <div className="produtos-section">
                <div className="produtos">
                    {produtos.map((produto, index) => (
                        <div className="produto-card" key={index}>
                            <h3>{produto.nome}</h3>
                            <p>R${produto.valor.toFixed(2)}</p>
                            <button>Visualizar</button>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<App />);

function Footer() {
  const anoAtual = new Date().getFullYear();

  return (
    <div>
      <footer>
        <div className="bunner">
          <h2>Compre e venda com o site</h2>
          <img src="./imgs/5837040.png" alt="Logo" />
        </div>

        <div className="pags">
          <h1>
            <i className="bi bi-credit-card-fill"></i>
          </h1>
          <h2>Pagamentos com</h2>

          <div className="forms">
            <h4>
              Crédito <i className="bi bi-credit-card-fill"></i>
            </h4>
            <h4>
              Débito <i className="bi bi-credit-card-2-back"></i>
            </h4>
            <h4>
              Pix <i className="bi bi-x-diamond-fill"></i>
            </h4>
          </div>

          <h3>
            Com parcelas de até <span className="cor-diferente">10X SEM JUROS</span>!
          </h3>
        </div>

        <div className="credits">
          <div className="ano">&copy;{anoAtual}</div>
          <p>Guilherme Barcelo das Neves</p>
        </div>
      </footer>
    </div>
  );
}

const footer = ReactDOM.createRoot(document.getElementById("footer"));
footer.render(<Footer />);
