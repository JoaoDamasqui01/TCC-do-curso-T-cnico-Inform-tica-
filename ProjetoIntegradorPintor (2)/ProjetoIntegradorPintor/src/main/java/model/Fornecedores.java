package model;


import javax.persistence.*;


@Entity
@Table(name = "fornecedores")
public class Fornecedores {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)

    private int idFornecedores;
    private String nomeFornecedor;
    private String endereco;
    private long cnpj;
    private long fone;


    public Fornecedores() {
    }

    public Fornecedores(String nomeFornecedor, String endereco, long cnpj, long fone) {
        this.nomeFornecedor = nomeFornecedor;
        this.endereco = endereco;
        this.cnpj = cnpj;
        this.fone = fone;
    }

    public int getIdFornecedores() {
        return idFornecedores;
    }

    public void setIdFornecedores(int idFornecedores) {
        this.idFornecedores = idFornecedores;
    }

    public String getNomeFornecedor() {
        return nomeFornecedor;
    }

    public void setNomeFornecedor(String nomeFornecedor) {
        this.nomeFornecedor = nomeFornecedor;
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereco(String endereco) {
        this.endereco = endereco;
    }

    public long getCnpj() {
        return cnpj;
    }

    public void setCnpj(long cnpj) {
        this.cnpj = cnpj;
    }

    public long getFone() {
        return fone;
    }

    public void setFone(long fone) {
        this.fone = fone;
    }
}
