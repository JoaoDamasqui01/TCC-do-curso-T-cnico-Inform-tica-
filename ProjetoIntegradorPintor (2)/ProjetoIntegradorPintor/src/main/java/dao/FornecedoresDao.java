package dao;

import model.Fornecedores;

import javax.persistence.EntityManager;
import java.util.List;

public class FornecedoresDao {
    private static EntityManager em;

    public FornecedoresDao (EntityManager em){
        this.em = em;
    }

    public void cadastrar(Fornecedores fornecedores){
        this.em.persist(fornecedores);
    }

    public static List<Fornecedores> buscarTodos(){
        String jpql = "SELECT c FROM Fornecedores c";
        return em.createQuery(jpql,Fornecedores.class).getResultList();
    }

    public static Fornecedores buscarPorId(int idFornecedores){
        return  em.find(Fornecedores.class, idFornecedores);
    }

    public void excluir(Fornecedores fornecedores){
        em.merge(fornecedores);
        this.em.remove(fornecedores);
    }

    public static void alterar(Fornecedores fornecedores){
        em.merge(fornecedores);
    }

}
